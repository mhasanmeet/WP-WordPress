# Text gradient animation

![Slider Shadow](./img-videos-gif/text-gradient-animation.gif)

## Codes

1. Animation Type 1

```html
<style>
#custom-gradient {
    background: linear-gradient(120deg, #146EFF 20.69%, #7644FF 50.19%, #3ECF90 79.69%);
    background-clip: text;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    color: transparent;
    background-clip: text;
    background-size: 500% auto;
    animation: herotxtanim 2s ease-in-out infinite alternate;
}

@keyframes herotxtanim{
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}
</style>
```

2. Animation Type 2

```html
<style>
    #custom-gradient {
    background: linear-gradient(120deg, #146EFF 20.69%, #7644FF 50.19%, #3ECF90 79.69%);
    background-clip: text;
    -webkit-background-clip: text;
    -moz-background-clip: text;
	color: transparent;
	background-clip: text;
	background-size: 500% auto;
    animation: herotxtanim 8s infinite alternate;
}

@keyframes herotxtanim{
	0%, 100% {
    filter: hue-rotate(0deg);
	}

	50% {
		filter: hue-rotate(360deg);
	}
}
</style>
```
