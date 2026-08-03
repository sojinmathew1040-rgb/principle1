<?php
@include_once __DIR__ . '/copy_photos.php';
$currentPage = basename($_SERVER['PHP_SELF']);
if (empty($currentPage)) {
    $currentPage = 'index.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? $pageTitle : 'Principle 1 Professional Services | US Mortgage Processing & Back-Office Outsourcing'; ?></title>
  <meta name="description" content="<?php echo isset($pageDesc) ? $pageDesc : 'Premier US mortgage processing outsourcing, AUS DU/LPA underwriting support, closing & funding coordination, and NMLS compliant audit services for US mortgage brokers and wholesale lenders.'; ?>">
  <meta name="keywords" content="US mortgage processing outsourcing, mortgage back-office support, AUS DU LPA underwriting, closing funding balancing, wholesale mortgage broker processing, NMLS quality control, Nikhil George Bose">
  <meta name="author" content="Principle 1 Professional Services">
  <meta name="robots" content="index, follow">

  <!-- Open Graph / Facebook / LinkedIn SEO -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Principle 1 Professional Services">
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'Principle 1 Professional Services | US Mortgage Processing Outsourcing'; ?>">
  <meta property="og:description" content="<?php echo isset($pageDesc) ? $pageDesc : '100% compliant US mortgage back-office processing, AUS execution, closing disclosure balancing, and quality control auditing for brokers nationwide.'; ?>">


  <!-- Twitter Card SEO -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'Principle 1 Professional Services | US Mortgage Processing'; ?>">
  <meta name="twitter:description" content="Turnkey US mortgage processing and back-office solutions for wholesale lenders and mortgage brokers.">
  <meta name="twitter:image" content="images/banner.png">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/logo.png">

  <!-- FontAwesome 6 Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Schema.org Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FinancialService",
    "name": "Principle 1 Professional Services",
    "image": "images/logo.png",
    "description": "Premier US mortgage processing outsourcing, AUS DU/LPA underwriter support, closing & funding balancing, and pre/post-closing quality control auditing.",
    "telephone": "+1-972-848-6868",
    "email": "nick@principle1pro.com",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Skyline Builders, Cochin International Airport Road, Nedumbassery",
      "addressLocality": "Ernakulam",
      "addressRegion": "Kerala",
      "postalCode": "683111",
      "addressCountry": "IN"
    },
    "founders": [
      {
        "@type": "Person",
        "name": "Nikhil George Bose",
        "jobTitle": "Founder & Managing Director",
        "sameAs": "https://www.linkedin.com/in/nikhil-george-bose-8a9a63353/"
      },
      {
        "@type": "Person",
        "name": "Georgee Jacob",
        "jobTitle": "Founder & Managing Director",
        "email": "George@principle1pro.com"
      }
    ],
    "areaServed": "US",
    "sameAs": [
      "https://www.linkedin.com/in/nikhil-george-bose-8a9a63353/"
    ]
  }
  </script>
</head>
<body>

  <!-- Ambient Light Orbs -->
  <div class="ambient-light-orb-1"></div>
  <div class="ambient-light-orb-2"></div>

  <!-- Header / Navigation -->
  <header class="header-nav" id="headerNav">
    <div class="container nav-container">
      <a href="index.php" class="brand-logo">
        <img src="images/logo_transparent.png" alt="Principle 1 Professional Services" class="brand-logo-img">
      </a>

      <nav class="nav-menu" id="navMenu">
        <a href="index.php" class="nav-link <?php echo ($currentPage == 'index.php' || $currentPage == 'index.html') ? 'active' : ''; ?>">Home</a>
        <a href="about.php" class="nav-link <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About Us</a>
        <a href="services.php" class="nav-link <?php echo ($currentPage == 'services.php') ? 'active' : ''; ?>">Services</a>
        <a href="contact.php" class="nav-link <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact Us</a>
      </nav>

      <div class="nav-actions">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation">
          <i class="fa-solid fa-bars"></i>
        </button>
      </div>
    </div>
  </header>
