import os
import shutil
import glob

brain_dir = r"C:\Users\sojin\.gemini\antigravity-ide\brain\66ba8bdf-6e34-417a-a31a-1101931d6f49"
dest_dir = r"c:\xampp\htdocs\principle1\images"

os.makedirs(dest_dir, exist_ok=True)

# Find all png/jpg/jpeg files in brain_dir and subdirs
all_images = []
for root, dirs, files in os.walk(brain_dir):
    for f in files:
        if f.lower().endswith(('.png', '.jpg', '.jpeg', '.webp')):
            path = os.path.join(root, f)
            mtime = os.path.getmtime(path)
            size = os.path.getsize(path)
            all_images.append((mtime, size, path))

all_images.sort(reverse=True)
print("Most recent images in brain dir:")
for mtime, size, path in all_images[:15]:
    print(f"{size} bytes | {path}")
    # If file size is around portrait size or recent non-system screenshot
    if "tempmediaStorage" in path or "input_file" in path or "media_" in path or "user_" in path:
        dest_path = os.path.join(dest_dir, "nikhil.jpg")
        shutil.copy(path, dest_path)
        shutil.copy(path, os.path.join(dest_dir, "nikhil.png"))
        print(f"--> COPIED {path} to {dest_path}")
