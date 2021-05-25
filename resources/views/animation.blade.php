
@extends('layouts.app')
@push('styles')
  <style media="screen">
  /* cube styles */
  .scene {
    width: 300px;
    height: 300px;
    perspective: 500px;
    margin: 120px auto;
  }

  .cube {
    width: 100%;
    height: 100%;
    position: relative;
    transform-style: preserve-3d;
    transform: translateZ(-150px);
    transition: transform 2s;
  }

  .cube-face {
    width: 100%;
    height: 100%;
    line-height: 300px;
    font-size: 3rem;
    position: absolute;
    border: 2px solid saddlebrown;
  }

  .cube-face:nth-child(1) {
    background-color: rgba(255, 0, 0, 0.5);
    transform: rotateY(0deg) translateZ(150px);
  }

  .cube-face:nth-child(2) {
    background-color: rgba(0, 128, 0, 0.5);
    transform: rotateX(180deg) translateZ(150px);
  }

  .cube-face:nth-child(3)  {
    background-color: rgba(0, 0, 255, 0.5);
    transform: rotateY(-90deg) translateZ(150px);
  }

  .cube-face:nth-child(4)  {
    background-color: rgba(255, 0, 255, 0.5);
    transform: rotateY(90deg) translateZ(150px);
  }

  .cube-face:nth-child(5)  {
    background-color: rgba(0, 255, 255, 0.5);
    transform: rotateX(90deg) translateZ(150px);
  }

  .cube-face:nth-child(6)  {
    background-color: rgba(255, 255, 0, 0.5);
    transform: rotateX(-90deg) translateZ(150px);
  }

  .radio-group {
    text-align: center;
  }

  .show-front {
    transform: translateZ(-150px) rotateY(0deg);
  }

  .show-back {
    transform: translateZ(-150px) rotateX(-180deg);
  }

  .show-left {
    transform: translateZ(-150px) rotateY(90deg);
  }

  .show-right {
    transform: translateZ(-150px) rotateY(-90deg);
  }

  .show-top {
    transform: translateZ(-150px) rotateX(-90deg);
  }

  .show-bottom {
    transform: translateZ(-150px) rotateX(90deg);
  }

  /* bouncing ball styles */
  #box {
    height: 500px;
    width: 500px;
  }

  #ball {
    width: 80px;
    height: 80px;
    position: relative;
    top: 420px;
    left: 210px;
  }

  .bouncing {
    animation: bounce 1s linear infinite alternate;
  }

  @keyframes bounce {
    0% {
      top: 420px;
    }

    100% {
      top: 0px;
    }
  }

  /* custom card styles */

  .custom-card-scene {
    width: 300px;
    height: 300px;
    perspective: 1000px;
    border: 2px solid springgreen;
    margin: 100px auto;
  }

  .custom-card {
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    position: relative;
    transition: transform 2s;
    transform-origin: center right;
  }

  .card-face {
    width: 100%;
    height: 100%;
    font-size: 4rem;
    text-align: center;
    line-height: 300px;
    position: absolute;
    backface-visibility: hidden;
  }

  .card-face:nth-child(1) {
    background-color: rgba(0, 0, 255, 0.5);
  }

  .card-face:nth-child(2) {
    background-color: rgba(255, 80, 168, 0.5);
    transform: rotateY(-180deg);
  }

  .flip {
    transform: translateX(-100%) rotateY(180deg);
  }

</style>
@endpush

@section('content')

  <div class="row m-0">
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          <h6 class="text-info">Cube Animation</h6>
        </div>
        <div class="card-body">
          <div class="scene">
            <div class="cube">
              <div class="cube-face text-center">Front</div>
              <div class="cube-face text-center">Back</div>
              <div class="cube-face text-center">Left</div>
              <div class="cube-face text-center">Right</div>
              <div class="cube-face text-center">Top</div>
              <div class="cube-face text-center">Bottom</div>
            </div>
          </div>

          <div class="radio-group">
            <input type="radio" name="rotate" id="front" value="front" checked />
            <label for="front" class="mr-3">Front</label>

            <input type="radio" name="rotate" id="back" value="back" />
            <label for="back" class="mr-3">Back</label>

            <input type="radio" name="rotate" id="left" value="left" />
            <label for="left" class="mr-3">Left</label>

            <input type="radio" name="rotate" id="right" value="right" />
            <label for="right" class="mr-3">Right</label>

            <input type="radio" name="rotate" id="top" value="top" />
            <label for="top" class="mr-3">Top</label>

            <input type="radio" name="rotate" id="bottom" value="bottom" />
            <label for="bottom" class="mr-3">Bottom</label>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          <h6 class="text-info">Ball Animation</h6>
        </div>
        <div class="card-body empty">

          <div id="box" class="border border-danger m-3 mx-auto">
            <div id="ball" class="bg-primary rounded-circle"></div>
          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-success mr-3" onclick="bounceStart()">Start</button>
            <button class="btn btn-danger" onclick="bounceStop()">Stop</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row m-0 mb-5">
    <div class="col-md-6 mt-3">

      <div class="card">
        <div class="card-header">
          <h6 class="text-info">Card Animation</h6>
        </div>
        <div class="card-body empty">

          <div class="custom-card-scene drag" draggable="true">
            <div class="custom-card">
              <div class="card-face">Front</div>
              <div class="card-face">Back</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mt-3">

      <div class="card">
        <div class="card-header">
          <h6 class="text-info">Drag and Drop</h6>
        </div>
        <div class="card-body empty">

        </div>
      </div>
    </div>
</div>

@endsection

@push('scripts')

  <script>
    const box = document.querySelector("#box");
    const ball = document.querySelector("#ball");
    const count = document.querySelector("#count");
    const boxElemClientHeight = box.clientHeight;
    const ballElemClientHeight = ball.offsetTop;

    function bounceStart() {
      ball.classList.add("bouncing");
      console.log(ballElemClientHeight);
      console.log(boxElemClientHeight);
      console.log(rect1.x);
      if (rect1.x < rect2.x + rect2.width &&
      rect1.x + rect1.width > rect2.x &&
      rect1.y < rect2.y + rect2.height &&
      rect1.y + rect1.height > rect2.y) {
        console.log("deteced");
      }
    }

    function bounceStop() {
      ball.classList.remove("bouncing");
    }


    // function isCollide(a, b) {
      //     return !(
      //         ((a.y + a.height) < (b.y)) ||
      //         (a.y > (b.y + b.height)) ||
      //         ((a.x + a.width) < b.x) ||
      //         (a.x > (b.x + b.width))
      //     );
      // }

      // ball.addEventListener('animationiteration', () => {
        //
        //   console.log("count")
        //
        //   // for (var i = 0; i < 100; i++) {
          //     //   count.textContent = i+1;
          //     // }
          //   });


          var rect1 = {x: box.clientX, y: box.clientY, width: 500, height: 500}
          var rect2 = {x: ball.clientX, y: ball.clientY, width: 80, height: 80}




          // cube scripts
          const cube = document.querySelector('.cube');
          const radioGroup = document.querySelector('.radio-group');
          let currentClass = '';

          radioGroup.addEventListener('change', () => {
            const checkedRadio = radioGroup.querySelector(':checked');
            const showClass = 'show-' + checkedRadio.value;

            if (currentClass) {
              cube.classList.remove(currentClass);
            }
            cube.classList.add(showClass);
            currentClass = showClass;
          });


          // Custom card scripts

          const card = document.querySelector('.custom-card');
          card.addEventListener('click', () => {
            card.classList.toggle('flip');
          });



          // ========================================

          const empty = document.querySelectorAll(".empty");
          const drag = document.querySelector(".drag");

          drag.addEventListener("dragstart", dragStart);
          drag.addEventListener("dragend", dragEnd);

          // requestAnimationFrame
          function dragStart(event) {
            console.log("start");
            this.style.backgroundColor = "green";
            requestAnimationFrame(() => (this.style.backgroundColor = "transparent"), 0);
          }

          function dragEnd() {
            console.log("end");
            // this.style.backgroundColor = "red";
          }

          for (const item of empty) {
            item.addEventListener("dragover", dragOver);
            item.addEventListener("dragenter", dragEnter);
            item.addEventListener("dragleave", dragLeave);
            item.addEventListener("drop", dragDrop);
          }

          // dragOver
          // preventDefault
          function dragOver() {
            event.preventDefault();
          }

          // dragEnter
          function dragEnter() {
            // this.style.backgroundColor = "gray";
          }

          // dragLeave
          function dragLeave() {
            // this.style.backgroundColor = "black";
          }

          // drop
          function dragDrop() {
            console.log("drop");
            this.append(drag);
          }


        </script>

      @endpush
