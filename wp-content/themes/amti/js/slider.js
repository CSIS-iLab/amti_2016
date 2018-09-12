let i,
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

  i = 0;

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
    dx = unify(e).clientX - x0;
    if (dx === 0) {
      ini = i;
      fin = i === N - 1 ? 0 : i + 1;
      i = fin;
    } else {
      if (dx < 0) {
        fin = i === N - 1 ? 0 : i + 1;
      } else if (dx > 0) {
        fin = i === 0 ? N - 1 : i - 1;
      }
      i = fin;
      ini = i;
    }

    f = 1;
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
    fin = [...document.querySelectorAll(".control")].indexOf(e.target);
    i = i || 0;

    ini = i;
    i = fin > i ? i : i * -1;

    let f = 1;
    anf = Math.round(f * NF);
    n = 2 + Math.round(f);
    ani();
    x0 = null;
    locked = false;
    i = fin;
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
