from PIL import Image
import os

def remove_white_bg(input_path, output_path):
    if not os.path.exists(input_path):
        return
    img = Image.open(input_path).convert("RGBA")
    datas = img.getdata()

    newData = []
    for item in datas:
        r, g, b, a = item
        # If pixel is near white background (r,g,b > 215)
        if r > 215 and g > 215 and b > 215:
            newData.append((255, 255, 255, 0)) # 100% transparent background
        else:
            # Preserve EXACT original Navy Blue and Steel Silver colors
            brightness = (r + g + b) / 3.0
            if brightness > 185:
                edge_alpha = int((255 - brightness) * 5.0)
                edge_alpha = max(0, min(255, edge_alpha))
                newData.append((r, g, b, edge_alpha))
            else:
                newData.append((r, g, b, a))

    img.putdata(newData)
    img.save(output_path, "PNG")

base_dir = "c:/xampp/htdocs/principle1/images"
original_logo = os.path.join(base_dir, "logo.png")
transparent_logo = os.path.join(base_dir, "logo_transparent.png")
dark_logo = os.path.join(base_dir, "logo_dark_header.png")

remove_white_bg(original_logo, transparent_logo)
remove_white_bg(original_logo, dark_logo)
print("Logo processed: White background removed, exact original navy & silver colors preserved!")
