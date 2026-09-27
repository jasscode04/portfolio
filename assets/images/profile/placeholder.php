<?php
// profile-placeholder.php
// This generates an SVG placeholder for the profile image
// It is used automatically when assets/images/profile/profile.jpg doesn't exist

header('Content-Type: image/svg+xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<svg width="400" height="400" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#0a1628;stop-opacity:1"/>
      <stop offset="100%" style="stop-color:#0f172a;stop-opacity:1"/>
    </linearGradient>
    <linearGradient id="accent" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1"/>
      <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:1"/>
    </linearGradient>
  </defs>
  <!-- Background -->
  <rect width="400" height="400" fill="url(#bg)" rx="24"/>
  <!-- Border -->
  <rect width="398" height="398" x="1" y="1" fill="none" stroke="url(#accent)" stroke-width="2" rx="23" opacity="0.4"/>
  <!-- Avatar circle -->
  <circle cx="200" cy="160" r="70" fill="url(#accent)" opacity="0.15"/>
  <circle cx="200" cy="155" r="48" fill="url(#accent)" opacity="0.3"/>
  <!-- Head -->
  <circle cx="200" cy="148" r="36" fill="#3b82f6" opacity="0.5"/>
  <!-- Body -->
  <ellipse cx="200" cy="260" rx="60" ry="42" fill="#3b82f6" opacity="0.3"/>
  <!-- Label -->
  <text x="200" y="335" font-family="Inter, sans-serif" font-size="13" font-weight="600"
        fill="#94a3b8" text-anchor="middle" letter-spacing="2">JASPRIT SINGH SANU</text>
  <text x="200" y="355" font-family="Inter, sans-serif" font-size="10" font-weight="400"
        fill="#475569" text-anchor="middle" letter-spacing="1">AI AUTOMATION ENTHUSIAST</text>
  <!-- Corner dots -->
  <circle cx="24" cy="24" r="4" fill="#3b82f6" opacity="0.5"/>
  <circle cx="376" cy="24" r="4" fill="#06b6d4" opacity="0.5"/>
  <circle cx="24" cy="376" r="4" fill="#8b5cf6" opacity="0.5"/>
  <circle cx="376" cy="376" r="4" fill="#3b82f6" opacity="0.5"/>
</svg>
