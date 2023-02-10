
function random(num) {
    return Math.floor(Math.random() * num);
}

function getRandomStyles() {
    // #F37460  #F4A684  #A6DCDE     #12908E  #FFF7F3
    let result = [[243, 116, 96], [244, 166, 132 ], [166, 220, 222], [18, 144, 142], [255, 247, 243]][Math.floor(Math.random() * 5)]
    let r = result[0];
    let g = result[1];
    let b = result[2];
    let mt = random(200);
    let ml = random(50);
    let dur = random(5) + 5;
    return `
  background-color: rgba(${r},${g},${b},0.7);
  color: rgba(${r},${g},${b},0.7); 
  box-shadow: inset -7px -3px 10px rgba(${r - 10},${g - 10},${b - 10},0.7);
  margin: ${mt}px 0 0 ${ml}px;
  animation: float ${dur}s ease-in infinite
  `;
}

function createBalloons(num,balloonContainer) {
    for (let i = num; i > 0; i--) {
        const balloon = document.createElement("div");
        balloon.className = "balloon";
        balloon.style.cssText = getRandomStyles();
        balloonContainer.append(balloon);
    }
}



$(document).ready(function(){

    const balloonContainer = document.getElementById("balloon-container");
    if(balloonContainer!==null) createBalloons(70,balloonContainer)

});

