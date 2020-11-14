var currentLoad = 0;

const levels = [
  {
    name: "Level 4",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 5",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 6",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 7",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 8",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 9",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 10",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 11",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 12",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 13",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 14",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
  {
    name: "Level 15",
    des: "Description of the level",
    img: "img/placeholder/400x400.png",
  },
];

function loadMore() {
  if (currentLoad >= levels.length) {
    document.getElementById("level-container").innerHTML +=
      '<div class="w-100" style="padding-right: 15px padding-left: 15px "><div class="card mb-4 card-lvl"><img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild" style="height: 400px"><div class="card-body"><h5 class="card-title text-center" style="color: #FFD700 font-size: 30px">Level 100</h5><h6 class="card-subtitle mb-2 text-center" style="opacity: 0.80 font-size: 20px">Beschreibung des Levels</h6></div></div></div>';
    document.getElementById("loadmore-btn").style.display = "none";
    return;
  }

  for (var i = currentLoad; i < currentLoad + 3; i++) {
    const level = levels[i];
    document.getElementById("level-container").innerHTML +=
      '<div class="col-12 col-sm-6 col-md-4 pb-4"><div class="card mb-4 card-lvl"><img class="card-img-top" src="' +
      level["img"] +
      '" alt="Platzhalter-Bild"><div class="card-body"><h5 class="card-title text-center">' +
      level["name"] +
      '</h5><h6 class="card-subtitle mb-2 text-muted text-center">' +
      level["des"] +
      "</h6></div></div></div>";
  }
  currentLoad += 3;
}

let CurAll = 0;

function loadAll() {
  if (CurAll == 0) {
    for (var all = 0; all < levels.length; all++) {
      const alls = levels[all];
      document.getElementById("level-container").innerHTML +=
        '<div class="col-12 col-sm-6 col-md-4 pb-4"><div class="card mb-4 card-lvl"><img class="card-img-top" src="' +
        alls["img"] +
        '" alt="Platzhalter-Bild"><div class="card-body"><h5 class="card-title text-center">' +
        alls["name"] +
        '</h5><h6 class="card-subtitle mb-2 text-muted text-center">' +
        alls["des"] +
        "</h6></div></div></div>";
    }
    document.getElementById("level-container").innerHTML +=
      '<div class="w-100" style="padding-right: 15px; padding-left: 15px; "><div class="card mb-4 card-lvl"><img class="card-img-top" src="img/placeholder/400x400.png" alt="Platzhalter-Bild" style="height: 400px;"><div class="card-body"><h5 class="card-title text-center" style="color: #FFD700; font-size: 30px;">Level 100</h5><h6 class="card-subtitle mb-2 text-center" style="opacity: 0.80; font-size: 20px;">Beschreibung des Levels</h6></div></div></div>';
    document.getElementById("loadmore-btn").style.display = "none";
    CurAll++;
  }
}