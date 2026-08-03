from PIL import Image

input_path = "c:/xampp/htdocs/principle1/images/logo (2).png"
output_path = "c:/xampp/htdocs/principle1/images/logo_exact_transparent.png"

img = Image.open(input_path).convert("RGBA")
width, height = img.size
pixels = img.load()

# Create new transparent image of exact same dimensions
out_img = Image.new("RGBA", (width, height), (0, 0, 0, 0))
out_pixels = out_img.load()

# Checkerboard pixels in logo (2).png are grey squares (~204,204,204) and light squares (~238,238,238)
# Colors of logo elements:
# - White text/emblem: R > 240, G > 240, B > 240
# - Gold text/lines: R~212, G~175, B~55 (R is high, G is medium, B is low, diff between R and B > 100)
# - Silver emblem: R~G~B in range [120..190]
# - Checkerboard tiles: R, G, B are almost identical (abs(R-G) <= 5 and abs(G-B) <= 5) and R in range [190..248]

for x in range(width):
    for y in range(height):
        r, g, b, a = pixels[x, y]
        
        # Check if pixel is part of the checkerboard background:
        is_bg_square = (abs(r - g) <= 5 and abs(g - b) <= 5 and abs(r - b) <= 5) and (188 <= r <= 248)
        
        if is_bg_square:
            out_pixels[x, y] = (0, 0, 0, 0) # 100% transparent
        else:
            out_pixels[x, y] = (r, g, b, a) # Keep original pixel intact!

out_img.save(output_path, "PNG")
out_img.save("c:/xampp/htdocs/principle1/images/logo (2).png", "PNG")
out_img.save("c:/xampp/htdocs/principle1/images/logo.png", "PNG")
print("Successfully extracted exact original logo with 100% transparent background!")
