import os
import re

base_dir = r"c:\xampp\htdocs\principle1"

with open(os.path.join(base_dir, "header.php"), "r", encoding="utf-8") as f:
    header_raw = f.read()

with open(os.path.join(base_dir, "footer.php"), "r", encoding="utf-8") as f:
    footer_raw = f.read()

def render_header(title, desc, page_name):
    h = re.sub(r'<\?php[\s\S]*?\?>', '', header_raw)
    h = h.replace("<?php echo isset($pageTitle) ? $pageTitle : 'Principle 1 Professional Services | US Mortgage Processing & Back-Office Outsourcing'; ?>", title)
    h = h.replace("<?php echo isset($pageDesc) ? $pageDesc : 'Premier US mortgage processing outsourcing, AUS DU/LPA underwriting support, closing & funding coordination, and NMLS compliant audit services for US mortgage brokers and wholesale lenders.'; ?>", desc)
    h = h.replace("<?php echo $currentPage; ?>", page_name)
    
    h = h.replace('class="nav-link <?php echo ($currentPage == \'index.php\' || $currentPage == \'index.html\') ? \'active\' : \'\'; ?>"', f'class="nav-link {"active" if page_name == "index.html" else ""}"')
    h = h.replace('class="nav-link <?php echo ($currentPage == \'about.php\') ? \'active\' : \'\'; ?>"', f'class="nav-link {"active" if page_name == "about.html" else ""}"')
    h = h.replace('class="nav-link <?php echo ($currentPage == \'services.php\') ? \'active\' : \'\'; ?>"', f'class="nav-link {"active" if page_name == "services.html" else ""}"')
    h = h.replace('class="nav-link <?php echo ($currentPage == \'contact.php\') ? \'active\' : \'\'; ?>"', f'class="nav-link {"active" if page_name == "contact.html" else ""}"')
    
    # Update navigation links from .php to .html
    h = h.replace('href="index.php"', 'href="index.html"')
    h = h.replace('href="about.php"', 'href="about.html"')
    h = h.replace('href="services.php"', 'href="services.html"')
    h = h.replace('href="contact.php"', 'href="contact.html"')

    # LOCK LOGO LINK TO INDEX.HTML ALWAYS
    h = re.sub(r'<a\s+href="[^"]*"\s+class="brand-logo"', '<a href="index.html" class="brand-logo"', h)
    return h.strip()

def render_footer():
    f = re.sub(r'<\?php echo date\(\'Y\'\); \?>', '2026', footer_raw)
    f = f.replace('href="index.php"', 'href="index.html"')
    f = f.replace('href="about.php"', 'href="about.html"')
    f = f.replace('href="services.php"', 'href="services.html"')
    f = f.replace('href="contact.php"', 'href="contact.html"')

    # LOCK LOGO LINK TO INDEX.HTML ALWAYS
    f = re.sub(r'<a\s+href="[^"]*"\s+class="brand-logo"', '<a href="index.html" class="brand-logo"', f)
    return f.strip()

pages = {
    "index.php": ("index.html", "Principle 1 Professional Services | US Mortgage Processing & Back-Office Outsourcing", "Premier US mortgage processing outsourcing, AUS DU/LPA underwriting support, closing & funding coordination for wholesale lenders and mortgage brokers."),
    "about.php": ("about.html", "About Us | Principle 1 Professional Services - US Mortgage Processing", "Learn about Principle 1 Professional Services, founded by Nikhil George Bose. We deliver high-volume, 100% compliant US mortgage back-office processing."),
    "services.php": ("services.html", "Our Services | Principle 1 Professional Services - US Mortgage Processing", "Explore our end-to-end US mortgage processing services, AUS DU/LPA execution, closing & funding support, and quality control auditing."),
    "contact.php": ("contact.html", "Contact Us | Principle 1 Professional Services - US Mortgage Back-Office", "Get in touch with Principle 1 Professional Services. Connect directly with our Senior Processing Lead on WhatsApp or email nick@principle1pro.com.")
}

for php_file, (html_file, title, desc) in pages.items():
    with open(os.path.join(base_dir, php_file), "r", encoding="utf-8") as f:
        content = f.read()
    
    parts = content.split("include 'header.php';")
    body = parts[1] if len(parts) > 1 else parts[0]
    
    body_parts = body.split("include 'footer.php';")
    body_content = body_parts[0]
    
    body_content = re.sub(r'^\s*\?>', '', body_content)
    body_content = re.sub(r'<\?php\s*$', '', body_content)
    
    body_content = body_content.replace('href="index.php"', 'href="index.html"')
    body_content = body_content.replace('href="about.php"', 'href="about.html"')
    body_content = body_content.replace('href="services.php"', 'href="services.html"')
    body_content = body_content.replace('href="contact.php"', 'href="contact.html"')
    
    full_html = render_header(title, desc, html_file) + "\n\n" + body_content.strip() + "\n\n" + render_footer()
    
    with open(os.path.join(base_dir, html_file), "w", encoding="utf-8") as f:
        f.write(full_html)
    print(f"Exported {php_file} -> {html_file}")

print("Vercel export complete!")
