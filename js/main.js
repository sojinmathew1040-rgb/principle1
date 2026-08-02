/* ==========================================================================
   PRINCIPLE1 - US MORTGAGE PROCESSING & BACK-OFFICE SOLUTIONS
   Interactive UI Scripting & Calculators
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  // Mobile Nav Toggle
  const mobileToggle = document.getElementById('mobileToggle');
  const navMenu = document.getElementById('navMenu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
      const icon = mobileToggle.querySelector('i');
      if (icon) {
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-xmark');
      }
    });
  }

  // Header Scroll Effect
  const headerNav = document.getElementById('headerNav');
  if (headerNav) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        headerNav.classList.add('scrolled');
      } else {
        headerNav.classList.remove('scrolled');
      }
    });
  }

  // Interactive Tabs (Why Choose Us)
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-content-panel');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-tab');
      
      tabBtns.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const targetPanel = document.getElementById(targetId);
      if (targetPanel) {
        targetPanel.classList.add('active');
      }
    });
  });

  // Interactive ROI & Savings Calculator
  const rangeVolume = document.getElementById('rangeVolume');
  const volumeVal = document.getElementById('volumeVal');
  const estSavings = document.getElementById('estSavings');
  const estHours = document.getElementById('estHours');

  if (rangeVolume && volumeVal && estSavings && estHours) {
    function updateCalc() {
      const loans = parseInt(rangeVolume.value);
      volumeVal.textContent = loans + ' Loans';
      
      // Cost savings: Average internal processor cost per loan ~$750 vs Principle1 back-office model ~$300 per closed loan -> $450 savings per file
      const savings = loans * 450;
      // Hours saved: ~15 hours per file saved for loan officer / broker
      const hours = loans * 15;

      estSavings.textContent = '$' + savings.toLocaleString();
      estHours.textContent = hours.toLocaleString() + ' hrs';
    }

    rangeVolume.addEventListener('input', updateCalc);
    updateCalc();
  }

  // Service Details Modal Viewer
  const serviceModal = document.getElementById('serviceModal');
  const modalTitle = document.getElementById('modalTitle');
  const modalBody = document.getElementById('modalBody');
  const modalClose = document.getElementById('modalClose');

  const serviceData = {
    'processor-exp': {
      title: 'Processor Exp - US Mortgage Specialists',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Our senior US mortgage processors average 15+ years of dedicated experience across Fannie Mae, Freddie Mac, FHA, VA, and USDA guidelines.</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Key Deliverables:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>Complete initial 1003 file setup and loan structure verification</li>
          <li>Initial borrower disclosure packaging and e-sign tracking</li>
          <li>Comprehensive VOE (Verification of Employment), VOD, VOR, & VOM ordering</li>
          <li>Detailed review of credit reports, liabilities, and debt-to-income (DTI) ratios</li>
          <li>Direct borrower communication to collect income, tax returns, and bank statements</li>
        </ul>
      `
    },
    'end-to-end': {
      title: 'End-to-End Mortgage Processing',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">We handle the entire loan lifecycle from initial application submission to Clear-To-Close (CTC).</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Full Process Breakdown:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>Day 1: File Setup & Lender Lock Verification</li>
          <li>Day 2: Disclosures, Title, Appraisal & Insurance Orders</li>
          <li>Day 3-4: Document Verification & AUS Execution</li>
          <li>Day 5: Underwriting Submission & Initial Approval</li>
          <li>Day 6-8: Condition Clearing & CTC Release</li>
        </ul>
      `
    },
    'closing-funding': {
      title: 'Closing & Funding Support with Brokers & Title',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Streamlining communication between Mortgage Brokers, Lenders, Escrow, and Title Companies for smooth CD issuance and wire funding.</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Closing Highlights:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>Closing Disclosure (CD) fee balancing with Title & Escrow</li>
          <li>Initial CD release tracking (TRID 3-day waiting period compliance)</li>
          <li>Final Closing Package preparation & Closing schedule management</li>
          <li>Wire & Funding condition verification with wholesale lender</li>
        </ul>
      `
    },
    'aus-underwriting': {
      title: 'AUS Execution & Underwriting Support',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Expert execution and findings reconciliation for Fannie Mae DU (Desktop Underwriter) & Freddie Mac LPA (Loan Product Advisor).</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Underwriting Support Specs:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>Comprehensive Income Analysis Worksheets (W2, 1040, Schedule C, Schedule E, K-1s)</li>
          <li>DU/LPA Findings audit & condition mapping</li>
          <li>Strive for 2-touch approval (Underwriting Submission -> Condition Clearing -> CTC)</li>
          <li>Direct condition clearing with lender underwriters</li>
        </ul>
      `
    },
    'audit-qc': {
      title: 'Audit & NMLS Quality Control',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Rigorous pre-closing and post-closing audit checks ensuring zero-defect quality and 100% regulatory compliance.</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Audit Standards:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>TRID, RESPA, TILA, & HMDA compliance audits</li>
          <li>Red Flag & Fraud detection checks</li>
          <li>Post-closing investor audit readiness</li>
          <li>NMLS Quality Control reporting</li>
        </ul>
      `
    },
    'ho6-appraisal': {
      title: 'HO6, Master Policy, Appraisal & Insurance Desk',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Specialized back-office management for condo insurances, master hazard policies, and appraisal desk reviews.</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">Insurance & Appraisal Services:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>HO6 Condo Walls-In Policy ordering & coverage ratio verification</li>
          <li>Condo Questionnaire (Full/Limited) review & Condo Project Approval</li>
          <li>Master Hazard & Flood Insurance Policy audit</li>
          <li>AMC Appraisal ordering, SSR tracking, & Appraisal Reconsideration of Value (ROV)</li>
        </ul>
      `
    },
    'ma-support': {
      title: 'Mergers & Acquisitions (M&A) Back-Office Support',
      body: `
        <p style="margin-bottom:16px; color:var(--text-sub);">Operational scaling and file auditing during mortgage company acquisitions or pipeline migrations.</p>
        <h4 style="margin-bottom:10px; color:var(--accent-cyan);">M&A Services Include:</h4>
        <ul style="list-style:disc; padding-left:20px; color:var(--text-sub); display:flex; flex-direction:column; gap:8px;">
          <li>Pipeline audit and active file status reconciliation</li>
          <li>Loan Origination System (LOS) data migration & setup</li>
          <li>Flexible staffing scale-up without fixed operational overhead</li>
          <li>Post-merger compliance audit and investor delivery support</li>
        </ul>
      `
    }
  };

  document.querySelectorAll('.open-service-modal').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const key = btn.getAttribute('data-service');
      if (serviceData[key] && serviceModal) {
        modalTitle.textContent = serviceData[key].title;
        modalBody.innerHTML = serviceData[key].body;
        serviceModal.classList.add('active');
      }
    });
  });

  if (modalClose && serviceModal) {
    modalClose.addEventListener('click', () => {
      serviceModal.classList.remove('active');
    });

    serviceModal.addEventListener('click', (e) => {
      if (e.target === serviceModal) {
        serviceModal.classList.remove('active');
      }
    });
  }

  // Contact Form Submission Handler
  const contactForm = document.getElementById('contactForm');
  const formSuccessMsg = document.getElementById('formSuccessMsg');

  if (contactForm && formSuccessMsg) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = contactForm.querySelector('button[type="submit"]');
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';
      }

      setTimeout(() => {
        contactForm.reset();
        contactForm.style.display = 'none';
        formSuccessMsg.style.display = 'block';
      }, 1200);
    });
  }
});
