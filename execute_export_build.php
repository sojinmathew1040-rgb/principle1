<?php
$baseDir = __DIR__;
$headerRaw = file_get_contents($baseDir . '/header.php');
$footerRaw = file_get_contents($baseDir . '/footer.php');

function renderHeaderClean($title, $desc, $pageName, $headerRaw) {
    $h = preg_replace('/<\?php[\s\S]*?\?>/', '', $headerRaw);
    $h = str_replace("<?php echo isset(\$pageTitle) ? \$pageTitle : 'Principle 1 Professional Services | US Mortgage Processing & Back-Office Outsourcing'; ?>", $title, $h);
    $h = str_replace("<?php echo isset(\$pageDesc) ? \$pageDesc : 'Premier US mortgage processing outsourcing, AUS DU/LPA underwriting support, closing & funding coordination, and NMLS compliant audit services for US mortgage brokers and wholesale lenders.'; ?>", $desc, $h);
    $h = str_replace("<?php echo \$currentPage; ?>", $pageName, $h);

    $h = str_replace('class="nav-link <?php echo ($currentPage == \'index.php\' || $currentPage == \'index.html\') ? \'active\' : \'\'; ?>"', 'class="nav-link ' . ($pageName == 'index.html' ? 'active' : '') . '"', $h);
    $h = str_replace('class="nav-link <?php echo ($currentPage == \'about.php\') ? \'active\' : \'\'; ?>"', 'class="nav-link ' . ($pageName == 'about.html' ? 'active' : '') . '"', $h);
    $h = str_replace('class="nav-link <?php echo ($currentPage == \'services.php\') ? \'active\' : \'\'; ?>"', 'class="nav-link ' . ($pageName == 'services.html' ? 'active' : '') . '"', $h);
    $h = str_replace('class="nav-link <?php echo ($currentPage == \'contact.php\') ? \'active\' : \'\'; ?>"', 'class="nav-link ' . ($pageName == 'contact.html' ? 'active' : '') . '"', $h);

    $h = str_replace('href="index.php"', 'href="index.html"', $h);
    $h = str_replace('href="about.php"', 'href="about.html"', $h);
    $h = str_replace('href="services.php"', 'href="services.html"', $h);
    $h = str_replace('href="contact.php"', 'href="contact.html"', $h);
    return trim($h);
}

function renderFooterClean($footerRaw) {
    $f = preg_replace('/<\?php echo date\(\'Y\'\); \?>/', '2026', $footerRaw);
    $f = str_replace('href="index.php"', 'href="index.html"', $f);
    $f = str_replace('href="about.php"', 'href="about.html"', $f);
    $f = str_replace('href="services.php"', 'href="services.html"', $f);
    $f = str_replace('href="contact.php"', 'href="contact.html"', $f);
    return trim($f);
}

$pages = [
    "index.php" => ["index.html", "Principle 1 Professional Services | US Mortgage Processing & Back-Office Outsourcing", "Premier US mortgage processing outsourcing, AUS DU/LPA underwriting support, closing & funding coordination for wholesale lenders and mortgage brokers."],
    "about.php" => ["about.html", "About Us | Principle 1 Professional Services - US Mortgage Processing", "Learn about Principle 1 Professional Services, founded by Nikhil George Bose. We deliver high-volume, 100% compliant US mortgage back-office processing."],
    "services.php" => ["services.html", "Our Services | Principle 1 Professional Services - US Mortgage Processing", "Explore our end-to-end US mortgage processing services, AUS DU/LPA execution, closing & funding support, and quality control auditing."],
    "contact.php" => ["contact.html", "Contact Us | Principle 1 Professional Services - US Mortgage Back-Office", "Get in touch with Principle 1 Professional Services. Connect directly with our Senior Processing Lead on WhatsApp or email nick@principle1pro.com."]
];

foreach ($pages as $phpFile => $meta) {
    $htmlFile = $meta[0];
    $title = $meta[1];
    $desc = $meta[2];

    $content = file_get_contents($baseDir . '/' . $phpFile);

    // Extract body cleanly between header include and footer include
    $parts = explode("include 'header.php';", $content);
    $body = count($parts) > 1 ? $parts[1] : $parts[0];
    
    $bodyParts = explode("include 'footer.php';", $body);
    $bodyContent = $bodyParts[0];

    // Clean any stray PHP tag boundaries
    $bodyContent = preg_replace('/^\s*\?>/', '', $bodyContent);
    $bodyContent = preg_replace('/<\?php\s*$/', '', $bodyContent);

    // Update links to .html
    $bodyContent = str_replace('href="index.php"', 'href="index.html"', $bodyContent);
    $bodyContent = str_replace('href="about.php"', 'href="about.html"', $bodyContent);
    $bodyContent = str_replace('href="services.php"', 'href="services.html"', $bodyContent);
    $bodyContent = str_replace('href="contact.php"', 'href="contact.html"', $bodyContent);

    $fullHtml = renderHeaderClean($title, $desc, $htmlFile, $headerRaw) . "\n\n" . trim($bodyContent) . "\n\n" . renderFooterClean($footerRaw);

    file_put_contents($baseDir . '/' . $htmlFile, $fullHtml);
    echo "SUCCESS: Exported $phpFile -> $htmlFile\n";
}

echo "All static HTML export files rebuilt with updated copyright company name!";
?>
