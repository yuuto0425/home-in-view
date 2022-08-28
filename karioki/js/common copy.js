// ページの読み込みを待つ
window.addEventListener('load', init);
 
// canvasのサイズを指定
const width = window.innerWidth; //ウインドウの横の長さ
const height = 400; //エリアの縦の長さ
 
function init() {
 
// シーンを作る
const scene = new THREE.Scene();
 
// カメラを作る
const camera = new THREE.PerspectiveCamera(45, width / height);
camera.position.set(0, 0, 1000); // x,y,z座標でカメラの場所を指定
 
// レンダラーを作る
const canvasElement = document.querySelector('#canvas') //HTMLのcanvasのid
const renderer = new THREE.WebGLRenderer({
  canvas: canvasElement,
  alpha:true,
  antialias: true, //追加 アンチエイリアス
});

// ライトを作る
const light = new THREE.AmbientLight(0xFFFFFF, 1); //環境光源（色、光の強さ）
scene.add(light);

const line = new THREE.LineSegments(
    new THREE.EdgesGeometry(geometry),
      new THREE.LineBasicMaterial({
        color: 0x000000, // 線の色（今回は黒）
      }),
    );
// 3Dオブジェクトを作る
const geometry = new THREE.DodecahedronGeometry(300, 0); // DodecahedronGeometry 正十二面体（半径、詳細）
const material = new THREE.MeshPhongMaterial();
const mesh = new THREE.Mesh(geometry, material);
mesh.add(line); //追加
  scene.add(mesh);
  // scene.add(geometry);
}
    
    //  //追加 枠線を作成
    // const line = new THREE.LineSegments(
    // new THREE.EdgesGeometry(geometry),
    //   new THREE.LineBasicMaterial({
    //     color: 0x000000, // 線の色（今回は黒）
    //   }),
    // );
     
    // const mesh = new THREE.Mesh(geometry, material);
    // mesh.add(line); //追加
    // scene.add(mesh);
