import shutil
import os

src_logo = r"C:\Users\sojin\Downloads\principle1\logo.jpeg"
dest_dir = r"c:\xampp\htdocs\principle1\images"
dest_logo = r"c:\xampp\htdocs\principle1\images\logo.jpeg"

os.makedirs(dest_dir, exist_ok=True)

if os.path.exists(src_logo):
    shutil.copy(src_logo, dest_logo)
    print(f"Successfully copied logo to {dest_logo}")
else:
    print(f"File not found: {src_logo}")

# Self delete after script
if os.path.exists(r"c:\xampp\htdocs\principle1\copy_logo.py"):
    os.remove(r"c:\xampp\htdocs\principle1\copy_logo.py")
