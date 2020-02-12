class Diaporama {
  constructor(time , tableau, idSlider){
    this.idSlider = idSlider;
    this.i = 0;
    this.time = time;
    this.Slider = '';
    this.sliderTimer = "";
    this.init(tableau);
  }

  init(tableau){
    this.Slider = tableau ;
    this.updateImg();
    this.keyboardDetect()
    this.addTimer();

    $(`#${this.idSlider} .image_slider`).click(() => {
      this.pauseSlider();
    });

    $(`#${this.idSlider} .pause`).click(() => {
      this.playSlider();
    });

    $(`#${this.idSlider} .avant`).click(() => {
        this.before();
    });

    $(`#${this.idSlider} .arriere`).click(() => {
        this.back();
    });

  }

  addi(){
    this.i++;
  }

  removei(){
    this.i--;
  }

  reseti(){
    this.i = 0;
  }

  autoPlay(){
    if(this.i < this.Slider.length - 1){
      this.addi();
      this.updateImg();
    } else { 
      this.reseti();
      this.updateImg();
    }
    this.addTimer();
  }

  addTimer(){
    this.sliderTimer = setTimeout(() => { this.autoPlay() }, this.time);
  }

  updateImg(){
    document.querySelector(`#${this.idSlider} img`).src = this.Slider[this.i].url;
  }

  back(){
    if(this.i < 1 ){
      this.i = this.Slider.length - 1;
      this.updateImg();
    }else{
      this.removei();
      this.updateImg();
    }
  }

  before(){
    if(this.i === this.Slider.length - 1){
      this.reseti();
      this.updateImg();
    }else{
      this.addi();
      this.updateImg();
    }
  }

  pauseSlider(){
    clearInterval(this.sliderTimer);
    $(`#${this.idSlider} .pause`).css('display' , 'flex');
    console.log('AutoPlay Désactivé');
  }

  playSlider(){
    this.autoPlay();
    $(`#${this.idSlider} .pause`).css('display' , 'none');
    console.log('AutoPlay réactivé');
  }

  keyboardDetect(){
   $(document).keydown((e) => { 
      switch (e.which){
        case 37: // fleche gauche
        this.back();
      break;
        case 39: // fleche droite
        this.before();
      break;
      } 
    });
  }
}