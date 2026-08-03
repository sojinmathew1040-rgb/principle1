from PIL import Image
import os

def process_logo(input_path, output_path):
    if not os.path.exists(input_path):
        print(f"File not found: {input_path}")
        return
        
    img = Image.open(input_path).convert("RGBA")
    datas = img.getdata()

    newData = []
    for item in datas:
        r, g, b, a = item
        
        # Check if pixel is part of the background checkerboard (grey/off-white squares)
        # Background pixels have r, g, b very close to each other and between 190 and 242
        is_bg_checkerboard = (abs(r - g) <= 8 and abs(g - b) <= 8 and abs(r - b) <= 8) and (180 <= r <= 242)
        
        if is_bg_checkerboard:
            newData.append((255, 255, 255, 0)) # transparent
        else:
            newData.append((r, g, b, a))

    img.putdata(newData)
    img.save(output_path, "PNG")
    print(f"Successfully created transparent logo at: {output_path}")

base_dir = "c:/xampp/htdocs/principle1/images"
input_logo = os.path.join(base_dir, "logo (2).png")
output_logo = os.path.join(base_dir, "logo_transparent.png")
output_logo_dark = os.path.join(base_dir, "logo_dark_header.png")
output_logo_direct = os.path.join(base_dir, "logo.png")

process_logo(input_logo, output_logo)
process_logo(input_logo, output_logo_dark)
process_logo(input_logo, output_logo_direct)
