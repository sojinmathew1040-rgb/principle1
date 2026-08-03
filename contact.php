<?php
$pageTitle = "Contact Us | Principle1 - US Mortgage Back-Office Solutions";
$pageDesc = "Contact Principle1 US Mortgage Processing. Inquire about end-to-end processing, closing/funding, AUS DU/LPA, underwriting support, and audit services.";
include 'header.php';
?>

  <!-- Page Header Hero -->
  <section class="page-hero-skyline">
    <div class="container">
      <div class="subtitle-badge subtitle-badge-gold">
        <i class="fa-solid fa-headset"></i> Connect With Our Team
      </div>
      <h1 style="font-size:3rem; margin-bottom:16px;">
        Get in Touch With <span class="text-gradient-cyan">Principle1</span>
      </h1>
      <p style="color:var(--text-sub); font-size:1.15rem; max-width:700px; margin:0 auto;">
        Have a question about our processing model, need a free file audit, or interested in a back-office partnership? Send us a message below or chat on WhatsApp.
      </p>
    </div>
  </section>

  <!-- Contact Form & Info Grid -->
  <section class="contact-section">
    <div class="container contact-grid">
      
      <!-- Contact Info Box -->
      <div class="contact-info-box">
        <div class="subtitle-badge">Reach Us Directly</div>
        <h3>Corporate & Operations Contact</h3>
        <p>Our senior processing leads and client success managers are available 24/7 during US operating windows.</p>

        <div class="contact-detail-list">
          <div class="detail-item">
            <div class="detail-icon"><i class="fa-solid fa-phone-volume"></i></div>
            <div class="detail-text">
              <h5>US Calling Number</h5>
              <p><a href="tel:+19728486868" style="color:var(--accent-cyan); font-weight:600;"><i class="fa-solid fa-phone"></i> +1 (972) 848-6868</a></p>
              <p style="font-size:0.85rem; color:var(--text-sub);">Wilmer, Texas, United States</p>
            </div>
          </div>

          <div class="detail-item">
            <div class="detail-icon" style="background:rgba(37, 211, 102, 0.1); border-color:var(--accent-emerald); color:var(--accent-emerald);"><i class="fa-brands fa-whatsapp"></i></div>
            <div class="detail-text">
              <h5>WhatsApp Support (UAE)</h5>
              <p><a href="https://wa.me/971585738055" target="_blank" style="color:var(--accent-emerald); font-weight:600;"><i class="fa-brands fa-whatsapp"></i> +971 58 573 8055 (Instant Chat)</a></p>
              <p style="font-size:0.85rem; color:var(--text-sub);">24/7 Back-Office WhatsApp Integration</p>
            </div>
          </div>

          <div class="detail-item">
            <div class="detail-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
            <div class="detail-text">
              <h5>Executive Leadership Contact</h5>
              <div style="display:flex; flex-direction:column; gap:12px; margin-top:8px;">
                <div>
                  <div style="font-weight:700; color:#FFFFFF; font-size:0.95rem;">Nikhil George Bose</div>
                  <a href="mailto:nick@principle1pro.com" style="color:#FFFFFF; font-weight:600; font-size:0.88rem;"><i class="fa-solid fa-envelope"></i> nick@principle1pro.com</a>
                </div>
                <div>
                  <div style="font-weight:700; color:#FFFFFF; font-size:0.95rem;">Georgee Jacob</div>
                  <a href="mailto:George@principle1pro.com" style="color:#FFFFFF; font-weight:600; font-size:0.88rem;"><i class="fa-solid fa-envelope"></i> George@principle1pro.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="detail-item">
            <div class="detail-icon"><i class="fa-solid fa-building-flag"></i></div>
            <div class="detail-text">
              <h5>Operations Office Address</h5>
              <p style="font-weight:600; color:var(--text-main); margin-bottom:4px;">Skyline Builders</p>
              <p style="font-size:0.9rem; color:var(--text-sub); line-height:1.5;">
                Cochin International Airport Road<br>
                Kochi Airport P.O., Nedumbassery<br>
                Ernakulam, Kerala – 683111, India
              </p>
              <p style="font-size:0.82rem; color:var(--text-muted); margin-top:6px;">*Serving US Mortgage Brokers & Lenders across all 50 US States.</p>
            </div>
          </div>

          <div class="detail-item">
            <div class="detail-icon"><i class="fa-solid fa-clock"></i></div>
            <div class="detail-text">
              <h5>US Operating Hours</h5>
              <p style="color:var(--accent-gold-light); font-weight:600;">Coverage Across All US Time Zones (EST, CST, MST, PST)</p>
              <p style="font-size:0.88rem; color:var(--text-sub);">Monday – Friday: Active Processing & Condition Clearance<br>Saturday & Sunday: Emergency On-Call Duty</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form Card -->
      <div class="contact-form-card">
        <div class="subtitle-badge subtitle-badge-gold" style="margin-bottom:12px;">Instant Inquiry</div>
        <h3 style="font-size:1.8rem; margin-bottom:8px; color:var(--text-main);">Send Us a Message</h3>
        <p style="color:var(--text-sub); margin-bottom:24px; font-size:0.95rem;">Submitting this inquiry will connect you directly with our processing desk on WhatsApp.</p>

        <form id="contactForm">
          <div class="form-group">
            <label for="fullName">Your Full Name *</label>
            <input type="text" id="fullName" class="form-control" placeholder="e.g. John Smith" required>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="phone">Phone / WhatsApp Number *</label>
              <input type="tel" id="phone" class="form-control" placeholder="+1 (555) 000-0000" required>
            </div>
            <div class="form-group">
              <label for="serviceSelect">Service Needed *</label>
              <select id="serviceSelect" class="form-control" required style="cursor:pointer;">
                <option value="End-to-End Mortgage Processing">End-to-End Mortgage Processing</option>
                <option value="Closing & Funding Support">Closing & Funding Support</option>
                <option value="AUS DU/LPA Underwriting">AUS DU/LPA Underwriting Support</option>
                <option value="HO6 & Appraisal Ops">HO6, Master Policy & Appraisal Desk</option>
                <option value="Audit & Quality Control">Pre/Post-Closing Audit & QC</option>
                <option value="M&A Support">Mortgage M&A Back-Office Support</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="message">How Can We Help Your Pipeline? *</label>
            <textarea id="message" class="form-control" placeholder="Mention your loan types (FHA, VA, Conv), monthly volume, or processing requirements..." required style="min-height:100px;"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width:100%; padding:16px; font-size:1.05rem; background:linear-gradient(135deg, #25D366 0%, #128C7E 100%); border:none; box-shadow:0 6px 20px rgba(37, 211, 102, 0.35);">
            <i class="fa-brands fa-whatsapp" style="font-size:1.3rem;"></i> Send Inquiry to WhatsApp (+971 58 573 8055)
          </button>
        </form>
      </div>
    </div>
  </section>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('fullName').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const service = document.getElementById('serviceSelect').value;
        const msg = document.getElementById('message').value.trim();

        const text = `Hello Principle1 Team,\n\nI would like to inquire about your services:\n\n*Name:* ${name}\n*Phone:* ${phone}\n*Service Requested:* ${service}\n*Message:* ${msg}`;

        const whatsappUrl = `https://wa.me/971585738055?text=${encodeURIComponent(text)}`;
        window.open(whatsappUrl, '_blank');
      });
    }
  });
  </script>

  <!-- FAQ Section -->
  <section style="padding:100px 0; background:var(--bg-main); border-top:1px solid var(--border-glass);">
    <div class="container" style="max-width:900px;">
      <div class="section-header">
        <div class="subtitle-badge">Frequently Asked Questions</div>
        <h2>Got Questions? <span class="text-gradient-cyan">We Have Answers</span></h2>
        <p>Everything you need to know about partnering with Principle1 for your mortgage processing back-office.</p>
      </div>

      <div style="display:flex; flex-direction:column; gap:20px;">
        <div class="glass-card" style="padding:24px;">
          <h4 style="font-size:1.15rem; color:var(--accent-gold-light); margin-bottom:10px;">
            <i class="fa-solid fa-circle-question"></i> How does your performance-based pricing work?
          </h4>
          <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.6;">
            We operate on a strictly performance-based fee structure: you only pay us when the loan file successfully closes and funds. If a loan is cancelled or denied, you pay nothing. There are zero upfront monthly retainers or setup charges.
          </p>
        </div>

        <div class="glass-card" style="padding:24px;">
          <h4 style="font-size:1.15rem; color:var(--accent-cyan); margin-bottom:10px;">
            <i class="fa-solid fa-circle-question"></i> What is your typical turnaround time for file setup and disclosures?
          </h4>
          <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.6;">
            Initial file setup, 1003 audit, and initial lender disclosure generation are executed within 24 hours of file receipt. Our 24/7 operating window allows us to process files overnight while your local office is closed.
          </p>
        </div>

        <div class="glass-card" style="padding:24px;">
          <h4 style="font-size:1.15rem; color:var(--accent-emerald); margin-bottom:10px;">
            <i class="fa-solid fa-circle-question"></i> How do you protect borrower Non-Public Personal Information (NPI)?
          </h4>
          <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.6;">
            All data transmissions occur over encrypted 256-bit SSL channels inside your secure Loan Origination System (LOS). We adhere strictly to GLBA, SOC-2, and NMLS data security compliance rules with zero local document retention.
          </p>
        </div>

        <div class="glass-card" style="padding:24px;">
          <h4 style="font-size:1.15rem; color:var(--accent-gold-light); margin-bottom:10px;">
            <i class="fa-solid fa-circle-question"></i> Which Loan Origination Systems (LOS) do your processors support?
          </h4>
          <p style="color:var(--text-sub); font-size:0.95rem; line-height:1.6;">
            Our senior processors are trained across all primary US LOS platforms including ICE Encompass, Calyx Point, ARIVE, BytePro, and Mortgage Builder, as well as wholesale lender portals (Rocket, UWM, Pennymac, LoanDepot, Homepoint, etc.).
          </p>
        </div>
      </div>
    </div>
  </section>

<?php include 'footer.php'; ?>
