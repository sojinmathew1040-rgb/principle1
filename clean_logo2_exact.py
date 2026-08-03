from PIL import Image
import os

input_file = "c:/xampp/htdocs/principle1/images/logo (2).png"
output_file = "c:/xampp/htdocs/principle1/images/logo_clean_png.png"

if os.path.exists(input_file):
    img = Image.open(input_file).convert("RGBA")
    w, h = img.size
    pix = img.load()

    # Create new image
    out_img = Image.new("RGBA", (w, h), (0, 0, 0, 0))
    out_pix = out_img.load()

    for x in range(w):
        for y in range(h):
            r, g, b, a = pix[x, y]
            
            # Checkerboard background colors in logo (2).png:
            # Grey squares: r~204, g~204, b~204 (diff between r,g,b <= 5 and 190<=r<=218)
            # Light squares: r~238, g~238, b~238 (diff between r,g,b <= 5 and 230<=r<=246)
            is_grey = (abs(r - g) <= 5 and abs(g - b) <= 5 and abs(r - b) <= 5) and (190 <= r <= 218)
            is_light = (abs(r - g) <= 5 and abs(g - b) <= 5 and abs(r - b) <= 5) and (230 <= r <= 246)

            if is_grey or is_light:
                out_pix[x, y] = (0, 0, 0, 0)
            else:
                out_pix[x, y] = (r, g, b, a)

    out_img.save(output_file, "PNG")
    print("Exact clean PNG saved!")
