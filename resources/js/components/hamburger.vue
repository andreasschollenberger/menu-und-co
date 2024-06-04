<template>
    <label>
        <input type="checkbox">
        <div class="toggle">
            <span class="top_line common"></span>
            <span class="middle_line common"></span>
            <span class="bottom_line common"></span>
        </div>

        <div class="slide">
            <h1>MENU</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Rezepte</a></li>
                <li><a href="#">Produkte</a></li>
                <li><a href="#">Restaurants</a></li>
                <li><a href="#">Tipps</a></li>
                <li><a href="#">Über uns</a></li>
                <li><a href="#">AGB</a></li>
            </ul>
        </div>
    </label>

</template>

<style scoped>

    .slide {
        width: 100%;
        transform: translateX(-100%);
    }

    .slide {
        height: 100%;
        width: 180px;
        position: absolute;
        background-color: #595656;
        transition: 0.5s ease;
        transform: translateX(-180px);
        opacity: 95%;
    }

    h1 {
        color: white;
        font-weight: 800;
        text-align: right;
        padding: 10px 0;
        padding-right: 30px;
        pointer-events: none;
    }

    ul li {
        list-style: none;
    }

    ul li a {
        color: rgb(196, 183, 181);
        font-weight: 500;
        padding: 5px 0;
        display: block;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.2s ease-out;
    }

    ul li:hover a {
        color: white;
        background-color: #4e4a4a;

    }

    input {
        display: none;
        visibility: hidden;
        -webkit-appearance: none;  
    }

    .toggle {
        position: absolute;
        height: 30px;
        width: 30px;
        top: 10px;
        left: 10px;
        z-index: 2;
        cursor: pointer;
        border-radius: 2px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .toggle .common {
        position: absolute;
        height: 2px;
        width: 20px;
        background-color: #333;
        border-radius: 50px;
        transition: 0.3s ease;
    }

    .toggle .top_line {
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .toggle .middle_line {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .toggle .bottom_line {
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    input:checked ~ .toggle .top_line {
        left: 2px;
        top: 14px;
        width: 25px;
        transform: rotate(45deg);
    }

    input:checked ~ .toggle .bottom_line {
        left: 2px;
        top: 14px;
        width: 25px;
        transform: rotate(-45deg);
    }

    input:checked ~ .toggle .middle_line {
    opacity: 0;
        transform: rotate(20px);
    }

    input:checked ~ .slide {
        transform: translateX(0);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }


</style>