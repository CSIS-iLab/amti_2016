let i = 0,
  x0 = null,
  locked = false,
  w,
  ini,
  fin,
  rID = null,
  anf,
  n,
  _C,
  N,
  NF,
  TFN;

document.addEventListener("DOMContentLoaded", function(event) {
  _C = document.querySelector(".island-slideshow-image .frame");
  N = _C.children.length;
  NF = 30;
  TFN = {
    "ease-in-out": function(k) {
      return 0.5 * (Math.sin((k - 0.5) * Math.PI) + 1);
    }
  };

  size();
  _C.style.setProperty("--n", N);

  addEventListener("resize", size, false);

  _C.addEventListener("mousedown", lock, false);
  _C.addEventListener("touchstart", lock, false);

  _C.addEventListener("mousemove", drag, false);
  _C.addEventListener("touchmove", drag, false);

  _C.addEventListener("mouseup", move, false);
  _C.addEventListener("touchend", move, false);
  _C.addEventListener("click", move, false);

  document
    .querySelector(".island-slideshow-slider")
    .addEventListener("click", control, false);
});

function stopAni() {
  cancelAnimationFrame(rID);
  rID = null;
}

function ani(cf = 0) {
  _C.style.setProperty("--i", ini + (fin - ini) * TFN["ease-in-out"](cf / anf));

  if (cf === anf) {
    stopAni();
    return;
  }

  rID = requestAnimationFrame(ani.bind(this, ++cf));
}

function unify(e) {
  return e.changedTouches ? e.changedTouches[0] : e;
}

function lock(e) {
  x0 = unify(e).clientX;
  locked = true;
}

function drag(e) {
  e.preventDefault();

  if (locked) {
    let dx = unify(e).clientX - x0,
      f = +(dx / w).toFixed(2);
    _C.style.setProperty("--i", i - f);
  }
}

function move(e) {
  if (locked) {
    let dx, s, f;
    if (unify(e).clientX - x0 === 0) {
      ini = i;
      if (i === N - 1) {
        fin = 0;
      } else {
        fin = i + 1;
      }
      f = 1;
      i = fin;
    } else {
      dx = unify(e).clientX - x0;
      s = Math.sign(dx);
      f = +((s * dx) / w).toFixed(2);
      ini = i - s * f;
      if (i === N - 1 && dx < 0) {
        fin = 0;
        i = fin;
      } else if (i === 0 && dx > 0) {
        fin = N - 1;
        i = fin;
      } else {
        fin = i + 1;
        i -= s;
      }
      f = 1 - f;
    }

    anf = Math.round(f * NF);
    n = 2 + Math.round(f);
    ani();
    x0 = null;
    locked = false;

    status(i);
  }
}

function control(e) {
  if (e.target.classList.contains("control")) {
    i = [...document.querySelectorAll(".control")].indexOf(e.target);

    let f = 1;
    ini = i;
    fin = i;

    anf = Math.round(f * NF);
    n = 2 + Math.round(f);
    ani();
    x0 = null;
    locked = false;

    status(i);
  }
}

function status(x) {
  [...document.querySelectorAll(".control")][x].classList.add("active");
  [...document.querySelectorAll(".control")].forEach(function(control, index) {
    if (index !== i) control.classList.remove("active");
  });

  [...document.querySelectorAll(".feature-caption")][x].style.display = "block";

  [...document.querySelectorAll(".feature-caption")].forEach(function(
    caption,
    index
  ) {
    if (index !== i) caption.style.display = "none";
  });
}

function size() {
  w = document.querySelector(".island-slideshow-image .frame").clientWidth;
}
