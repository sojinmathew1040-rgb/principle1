from PIL import Image
import os

input_path = "c:/xampp/htdocs/principle1/images/logo (2).png"
output_path = "c:/xampp/htdocs/principle1/images/logo_transparent.png"
output_path_clean = "c:/xampp/htdocs/principle1/images/logo_clean.png"

if not os.path.exists(input_path):
    print("File not found!")
    exit()

img = Image.open(input_path).convert("RGBA")
width, height = img.size
pixels = img.load()

# Create new transparent image
new_img = Image.new("RGBA", (width, height), (0, 0, 0, 0))
new_pixels = new_img.load()

# Flood fill / RGB threshold detection for fake checkerboard
# Checkerboard consists of light grey (~204, 204, 204) and white (~238-245) tiles
# The white text "PRINCIPLE" has pure solid white (255, 255, 255)
# The gold text "1" has R~212, G~175, B~55 (gold)
# The emblem has silver R~G~B in range [140..190] and white [250..255]

for x in range(width):
    for y in range(height):
        r, g, b, a = pixels[x, y]
        
        # Check if pixel is part of the fake checkerboard background:
        # Checkerboard dark squares: r==g==b in range(195, 225)
        # Checkerboard light squares: r==g==b in range(226, 248)
        is_grey_square = (abs(r - g) <= 4 and abs(g - b) <= 4 and abs(r - b) <= 4) and (195 <= r <= 225)
        is_light_square = (abs(r - g) <= 4 and abs(g - b) <= 4 and abs(r - b) <= 4) and (226 <= r <= 248)
        
        if is_grey_square or is_light_square:
            # Make transparent
            new_pixels[x, y] = (0, 0, 0, 0)
        else:
            new_pixels[x, y] = (r, g, b, a)

new_img.save(output_path, "PNG")
new_img.save(output_path_clean, "PNG")
new_img.save("c:/xampp/htdocs/principle1/images/logo (2).png", "PNG")
print("Fake checkerboard background removed successfully!")
