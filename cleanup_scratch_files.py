import os

base_dir = r"c:\xampp\htdocs\principle1"

unwanted_files = [
    "build_clean_logo_png.php",
    "clean_logo2_exact.py",
    "convert_logo.py",
    "convert_logo2.py",
    "copy_new_logo.php",
    "copy_photos.php",
    "generate_final_clean_logos.py",
    "optimize_images.php",
    "process_checkerboard.py",
    "process_logo_gd.php",
    "run_build_vercel.php",
    "run_checkerboard.php",
    "run_convert.php",
    "run_logo.php",
    "strip_bg_exact.php",
    "strip_exact.py",
    "sync_logo_files.php"
]

removed_count = 0
for file_name in unwanted_files:
    file_path = os.path.join(base_dir, file_name)
    if os.path.exists(file_path):
        try:
            os.remove(file_path)
            print(f"Removed: {file_name}")
            removed_count += 1
        except Exception as e:
            print(f"Could not remove {file_name}: {e}")

print(f"\nCleanup finished! Removed {removed_count} temporary/unwanted files.")
