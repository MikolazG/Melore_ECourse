<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

:root{
  --ink:#0b0f19;
  --muted:#6b7280;
  --line:rgba(15,23,42,.14);
  --card:rgba(255,255,255,.78);
  --glass:rgba(255,255,255,.62);
  --shadow:0 28px 90px rgba(2,6,23,.16);
  --shadow2:0 18px 48px rgba(2,6,23,.12);
  --radius:22px;
}

body{font-family:'Poppins',system-ui,-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;}
a{text-decoration:none;}

.soft-bg{
  background:
    radial-gradient(900px 380px at 15% 5%, rgba(99,102,241,.14), transparent 60%),
    radial-gradient(820px 360px at 85% 10%, rgba(236,72,153,.12), transparent 60%),
    radial-gradient(900px 420px at 50% 90%, rgba(34,197,94,.10), transparent 62%),
    linear-gradient(#fff,#fff);
}

.hero{padding: 5rem 0 3.5rem;}
.badge-pill{
  display:inline-flex; gap:.5rem; align-items:center;
  padding:.55rem 1.05rem; border-radius:999px;
  background: var(--glass); border:1px solid var(--line);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
  font-size:.78rem; letter-spacing:.18em; text-transform:uppercase;
  font-weight:600; color:var(--ink);
}
.badge-dot{
  width:8px;height:8px;border-radius:99px;background:#22c55e;
  box-shadow:0 0 0 6px rgba(34,197,94,.15);
}
.hero-title{
  font-family:'Playfair Display',serif; font-weight:700;
  letter-spacing:-.03em; line-height:1.05;
  font-size: clamp(2.8rem, 5vw, 4.4rem);
  color:var(--ink); margin:.9rem 0 1rem;
}
.hero-sub{max-width: 720px; margin:0 auto; color:var(--muted); font-size:1.05rem;}
.hero-actions{margin-top:1.8rem; margin-bottom: 2.4rem;}
.btn-pill{border-radius:999px; padding:.95rem 2.2rem; font-weight:600; transition:.2s ease;}
.btn-primary-modern{
  background: var(--ink); color:#fff; border:1px solid var(--ink);
  box-shadow:0 18px 35px rgba(2,6,23,.18);
}
.btn-primary-modern:hover{
  transform: translateY(-2px);
  box-shadow:0 24px 55px rgba(2,6,23,.25);
  background:#111827; color:#fff;
}
.btn-outline-modern{
  background: rgba(255,255,255,.75);
  border:1px solid var(--line); color:var(--ink);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
}
.btn-outline-modern:hover{
  transform: translateY(-2px);
  border-color: rgba(2,6,23,.35); color:var(--ink);
}

.video-wrap{
  max-width: 1040px; margin: 0 auto 2.8rem;
  border-radius: calc(var(--radius) + 6px);
  overflow:hidden; border:1px solid var(--line);
  background:#0b0f19; box-shadow: var(--shadow);
  position:relative;
}
.video-wrap::after{
  content:""; position:absolute; inset:0;
  background: linear-gradient(180deg, rgba(2,6,23,.0) 35%, rgba(2,6,23,.55) 100%);
  pointer-events:none;
}
.video-topbar{
  position:absolute; top:14px; left:14px; right:14px;
  z-index:3; display:flex; align-items:center; justify-content:space-between; gap:12px;
}
.win-dots span{
  display:inline-block; width:9px; height:9px; border-radius:999px;
  margin-right:6px; background:rgba(255,255,255,.35);
}
.video-chip{
  padding:.35rem .85rem; border-radius:999px;
  border:1px solid rgba(255,255,255,.25);
  color:rgba(255,255,255,.9);
  background:rgba(2,6,23,.25);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
  font-size:.82rem;
}
.video-cta{
  position:absolute; bottom:18px; left:18px; z-index:3; color:#fff;
}
.video-cta h5{margin:0 0 .35rem; font-weight:700;}
.video-cta p{margin:0; opacity:.85; font-size:.95rem;}
.hero-video{width:100%; height:auto; display:block;}

.hero-cards{max-width: 1040px; margin: 0 auto;}
.hcard{
  position:relative; border-radius: calc(var(--radius) + 2px);
  overflow:hidden; min-height: 200px;
  border:1px solid var(--line); box-shadow: var(--shadow2);
  background-size:cover; background-position:center;
  transform: translateZ(0);
  transition: .22s ease;
}
.hcard::before{
  content:""; position:absolute; inset:0;
  background: linear-gradient(180deg, rgba(2,6,23,.05) 0%, rgba(2,6,23,.72) 100%);
}
.hcard:hover{transform: translateY(-4px); box-shadow: 0 26px 70px rgba(2,6,23,.18);}
.hcard-body{position:relative; z-index:2; padding: 1.05rem 1.1rem 1.15rem; color:#fff;}
.hpill{
  display:inline-flex; padding:.28rem .75rem; border-radius:999px;
  background: rgba(255,255,255,.86); color:var(--ink);
  font-weight:700; font-size:.75rem;
}
.hmeta{opacity:.9; font-size:.82rem;}
.htitle{font-weight:700; margin:.55rem 0 .25rem;}
.hpill.success{background: rgba(34,197,94,.92); color:#fff;}
.hpill.danger{background: rgba(239,68,68,.92); color:#fff;}
.hpill.warning{background: rgba(245,158,11,.92); color:#111827;}

/* SECTION TITLES */
.section{padding: 4.2rem 0;}
.section-label{
  font-size:.7rem; text-transform:uppercase; letter-spacing:.22em;
  color:#9ca3af; font-weight:700; text-align:center; margin-bottom:.6rem;
}
.section-title{
  text-align:center; color:var(--ink); font-weight:700;
  letter-spacing:-.02em; margin-bottom:2.2rem;
}

.info-area{
  background:
    radial-gradient(900px 450px at 20% 0%, rgba(99,102,241,.12), transparent 60%),
    linear-gradient(#fff,#fff);
}
.info-card{
  border-radius: calc(var(--radius) + 8px);
  background: var(--card); border:1px solid var(--line);
  box-shadow: var(--shadow);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
  padding: 2.6rem 2.7rem;
}
.info-slide{display:none; opacity:0; transform: translateY(10px); transition:.25s ease;}
.info-slide.active{display:block; opacity:1; transform: translateY(0);}
.arrow{
  width:40px;height:40px;border-radius:999px;
  border:1px solid var(--line);
  background: rgba(255,255,255,.8);
  backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);
  box-shadow:0 14px 35px rgba(2,6,23,.12);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer; transition:.2s ease;
}
.arrow:hover{
  transform: translate(-50%, -50%) scale(1.06);
  border-color: rgba(2,6,23,.38);
}

.slider-shell{
  position:relative;
  max-width:1080px;
  margin:0 auto;
  overflow: visible; /* FIX arrow ke-clip */
}

.arrow.left{
  position:absolute;
  left:10px;
  top:50%;
  transform: translate(-50%, -50%);
  z-index: 50; /* FIX ketutup card */
  background: rgba(255,255,255,.95);
  border-color: rgba(2,6,23,.22);
}

.arrow.right{
  position:absolute;
  right:10px;
  top:50%;
  transform: translate(50%, -50%);
  z-index: 50; /* FIX ketutup card */
  background: rgba(255,255,255,.95);
  border-color: rgba(2,6,23,.22);
}

.dots{display:flex; justify-content:center; gap:8px; margin-top:1rem;}
.dot{
  width:8px;height:8px;border-radius:99px;
  background: rgba(2,6,23,.18); transition:.2s ease;
}
.dot.active{width:22px; background: rgba(2,6,23,.75);}


.live{
  background:#0b0f19; border-radius: calc(var(--radius) + 2px);
  border:1px solid rgba(255,255,255,.10);
  padding: 1.7rem 1.8rem;
  box-shadow: 0 28px 90px rgba(2,6,23,.45);
  color:#e5e7eb;
}
.live-row{
  border-radius: 14px;
  border:1px solid rgba(255,255,255,.10);
  padding:.55rem .75rem;
  display:flex; align-items:center; justify-content:space-between;
  margin-bottom:.45rem;
}
.live-row.active{border-color: rgba(34,197,94,.65);}
.live-dot{
  width:14px;height:14px;border-radius:99px;
  border:2px solid rgba(255,255,255,.3);
}
.live-dot.active{background:#22c55e;border-color:#22c55e;}
.step-pill{
  display:inline-flex; padding:.35rem 1.05rem; border-radius:999px;
  border:1px solid var(--line);
  background: rgba(255,255,255,.75);
  font-size:.72rem; letter-spacing:.18em; text-transform:uppercase;
  font-weight:800; color:var(--ink);
}
.step-h{
  font-weight:800; letter-spacing:-.02em;
  font-size: clamp(1.8rem, 2.6vw, 2.3rem);
  margin:.8rem 0 .8rem; color:var(--ink);
}
.step-p{color: rgba(2,6,23,.78); max-width: 520px;}

.partners-outline{
  background:#fff;
  border-top: 2px solid #000;
  border-bottom: 2px solid #000;
  padding: 3.2rem 0 3.4rem;
}
.partner-row{
  display:flex; flex-wrap:wrap;
  justify-content:center;
  gap: 1.4rem 3.2rem;
  opacity:.9;
}
.partner{
  font-weight:800; letter-spacing:.14em;
  text-transform:uppercase;
  color: rgba(2,6,23,.78);
}
.partner.i1{font-family:'Playfair Display',serif; font-style:italic; text-transform:none; letter-spacing:.05em;}
.partner.i3{font-family:'Courier New',monospace; text-transform:none; letter-spacing:.06em;}

.mentors{background: linear-gradient(#f9fafb,#ffffff);}
.mentor-grid{
  display:grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 1.2rem;
}
.mcard{
  border-radius: calc(var(--radius) + 6px);
  overflow:hidden;
  border:1px solid var(--line);
  background:#fff;
  box-shadow: var(--shadow2);
  transition:.22s ease;
}
.mcard:hover{transform: translateY(-4px); box-shadow: 0 26px 70px rgba(2,6,23,.16);}
.mimg{width:100%; height:240px; object-fit:cover; display:block;}
.mbody{padding: 1rem 1.1rem 1.2rem;}
.mname{font-weight:800; color:var(--ink); margin:0;}
.mrole{color:rgba(2,6,23,.58); font-size:.9rem; margin:.25rem 0 0;}
.mlink{
  display:inline-flex; margin-top:.85rem;
  font-weight:700; color:var(--ink);
  opacity:.85;
}
.mlink:hover{opacity:1;}

.community{
  background:
    radial-gradient(820px 420px at 50% 0%, rgba(167,139,250,.18), transparent 60%),
    linear-gradient(#fff,#fff);
  text-align:center;
}
.icon-row{
  display:flex; justify-content:center; gap: 12px;
  margin: 1.2rem 0 2.2rem;
}
.cicon{
  width:46px; height:46px; border-radius:999px;
  background:#0b0f19;
  display:flex; align-items:center; justify-content:center;
  box-shadow:0 16px 40px rgba(2,6,23,.35);
}
.cicon img{width:22px;height:22px;object-fit:contain;}
.cgrid{
  max-width: 1180px;
  margin: 0 auto;
  display:grid;
  grid-template-columns: 1.4fr 1.6fr 1.2fr 1.6fr 1.4fr;
  grid-auto-rows: 220px;
  gap: 1.1rem;
}
.ccard{
  border-radius: calc(var(--radius) + 6px);
  overflow:hidden;
  border:1px solid var(--line);
  box-shadow: var(--shadow2);
  background:#fff;
}
.cphoto{width:100%;height:100%;object-fit:cover;display:block;}
.ccard.stat{
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  background: rgba(167,139,250,.22);
  padding: 1.2rem;
}
.ccard.stat h3{font-weight:900; font-size:2.1rem; margin:0;}
.ccard.stat p{margin:.35rem 0 0; color:rgba(2,6,23,.65);}
.ccard.stat.orange{background: rgba(249,115,83,.92); color:#111827;}
.ccard.stat.orange p{color:rgba(2,6,23,.7);}

.ccard.left-stat{grid-column:1/2; grid-row:1/3;}
.ccard.right-stat{grid-column:5/6; grid-row:1/3;}
.ccard.mid1{grid-column:2/3; grid-row:1/2;}
.ccard.mid2{grid-column:3/4; grid-row:1/2;}
.ccard.mid3{grid-column:4/5; grid-row:1/2;}
.ccard.bot1{grid-column:2/3; grid-row:2/3;}
.ccard.centerStat{grid-column:3/4; grid-row:2/3;}
.ccard.bot3{grid-column:4/5; grid-row:2/3;}

@media (max-width: 991.98px){
  .mentor-grid{grid-template-columns: repeat(2, minmax(0,1fr));}
  .cgrid{grid-template-columns: repeat(2, minmax(0,1fr)); grid-auto-rows: 200px;}
  .ccard.left-stat,.ccard.right-stat,.ccard.mid1,.ccard.mid2,.ccard.mid3,.ccard.bot1,.ccard.centerStat,.ccard.bot3{
    grid-column:auto; grid-row:auto;
  }
  .info-card{padding: 2.2rem 1.7rem;}
}
@media (max-width: 575.98px){
  .mentor-grid{grid-template-columns: 1fr;}
  .cgrid{grid-template-columns: 1fr; grid-auto-rows: 210px;}
  .arrow.left{left:6px;}
  .arrow.right{right:6px;}
}
</style>
