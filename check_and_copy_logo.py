import os
import shutil

download_dir = r"C:\Users\sojin\Downloads\principle1"
images_dir = r"c:\xampp\htdocs\principle1\images"

os.makedirs(images_dir, exist_ok=True)

print("Files in Downloads/principle1:")
if os.path.exists(download_dir):
    for f in os.listdir(download_dir):
        print(" -", f)
        src = os.path.join(download_dir, f)
        dest = os.path.join(images_dir, f)
        shutil.copy(src, dest)
        if f.lower().startswith("logo"):
            # Also copy to logo.png and logo.jpeg just in case
            shutil.copy(src, os.path.join(images_dir, "logo.png"))
            shutil.copy(src, os.path.join(images_dir, "logo.jpeg"))
            print(f"Copied {f} to images/logo.png and images/logo.jpeg")
else:
    print("Download dir not found")

print("Files in images:")
for f in os.listdir(images_dir):
    print(" -", f)
