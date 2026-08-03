from PIL import Image
import os

base_dir = "c:/xampp/htdocs/principle1/images"
input_file = os.path.join(base_dir, "logo (2).png")

if os.path.exists(input_file):
    img = Image.open(input_file).convert("RGBA")
    w, h = img.size
    pix = img.load()

    out = Image.new("RGBA", (w, h), (0, 0, 0, 0))
    out_pix = out.load()

    for x in range(w):
        for y in range(h):
            r, g, b, a = pix[x, y]
            diff = max(r, g, b) - min(r, g, b)
            if diff <= 6 and 180 <= r <= 248:
                out_pix[x, y] = (0, 0, 0, 0)
            else:
                out_pix[x, y] = (r, g, b, a)

    out.save(os.path.join(base_dir, "logo_exact_transparent.png"), "PNG")
    out.save(os.path.join(base_dir, "logo_transparent.png"), "PNG")
    out.save(os.path.join(base_dir, "logo.png"), "PNG")
    print("All transparent PNG logo assets generated successfully!")
