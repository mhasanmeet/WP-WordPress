# Image Carousel Musk / Slider Shadow

![Slider Shadow](./img-videos-gif/img-carousel-musk.gif)

select elementor image carousel `.swiper-wrapper` class's parent class `.elementor-widget-image-carouse`

## Code 1: Musk Image

```css
  .elementor-widget-image-carouse{
  -webkit-mask-image: linear-gradient(90deg,transparent 5%,#000 30%, #000 70%,transparent 95%);
  }

```

## Code 2: Before, After linear gradient

```css

.elementor-widget-image-carousel:before{
 content: "";
  position: absolute;
  left: 0;
  height: 100%;
  width: 48px;
  z-index: 2;
  top: 0;
  background-image: linear-gradient(90deg, #fff, hsla(0, 0%, 100%, 0));
}

.elementor-widget-image-carousel:after{
 content: "";
  position: absolute;
  right: 0;
  height: 100%;
  width: 48px;
  z-index: 2;
  top: 0;
  background-image: linear-gradient(270deg, #fff, hsla(0, 0%, 100%, 0));
}
```
