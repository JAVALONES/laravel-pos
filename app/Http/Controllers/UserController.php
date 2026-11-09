<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $this->storeAvatar($request->file('avatar'));
        }

        User::create([
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users, where:id != $id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $avatarPath = $user->avatar;
        if ($request->hasFile('avatar')) {
            if ($avatarPath) {
                Storage::disk('public')->delete($avatarPath);
            }
            $avatarPath = $this->storeAvatar($request->file('avatar'));
        }

        $user->update([
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    protected function storeAvatar($file)
    {
        $filename = time() . '_' . $file->hashName();
        $path = $file->storeAs('avatars', $filename, 'public');

        // Resize to 200x200 thumbnail using GD (no Intervention)
        $fullPath = storage_path('app/public/' . $path);
        if (file_exists($fullPath)) {
            $size = getimagesize($fullPath);
            if ($size) {
                list($width, $height) = $size;
                $thumb = imagecreatetruecolor(200, 200);
                $source = null;
                $mime = mime_content_type($fullPath);
                if (strpos($mime, 'jpeg') !== false || strpos($mime, 'jpg') !== false) {
                    $source = imagecreatefromjpeg($fullPath);
                } elseif (strpos($mime, 'png') !== false) {
                    $source = imagecreatefrompng($fullPath);
                    imagealphablending($thumb, false);
                    imagesavealpha($thumb, true);
                } elseif (strpos($mime, 'gif') !== false) {
                    $source = imagecreatefromgif($fullPath);
                }
                if ($source) {
                    imagecopyresampled($thumb, $source, 0, 0, 0, 0, 200, 200, $width, $height);
                    // overwrite with resized
                    if (strpos($mime, 'jpeg') !== false || strpos($mime, 'jpg') !== false) {
                        imagejpeg($thumb, $fullPath, 85);
                    } elseif (strpos($mime, 'png') !== false) {
                        imagepng($thumb, $fullPath);
                    } elseif (strpos($mime, 'gif') !== false) {
                        imagegif($thumb, $fullPath);
                    }
                    imagedestroy($source);
                    imagedestroy($thumb);
                }
            }
        }

        return $path;
    }
}