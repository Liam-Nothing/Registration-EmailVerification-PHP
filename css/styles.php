<?php

header('content-type: text/css');
require_once("../includes/config.php");
// ob_start('ob_gzhandler');
// header('Cache-Control: max-age=31536000, must-revalidate');

?>

html {
    box-sizing: border-box
}

*,
*:before,
*:after {
    box-sizing: inherit
}

html {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%
}

body {
    margin: 0
}

html {
    animation: opac 0.8s
}

@keyframes opac {
    from {
        opacity: 0
    }

    to {
        opacity: 1
    }
}

body {
    font-family: "Raleway", Arial, sans-serif;
    color: #3a3a3a;
    animation: opac 1s;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

header {
    padding: 20px 0px;
    width: 100%;
    background: <?=$config_web["color"]?>;
    text-align: center;
    font-family: Verdana, sans-serif;
}

header h1 {
    font-size:18px;
    color: white !important;
    font-weight: bold;
}

h3 {
    font-weight: 600;
    font-size: 20px;
    margin: 10px 0;
}

.center {
    text-align: center;
}

.sc {
    width: max-content;
}

input[type=text],input[type=email],input[type=tel] {
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 400px;
    max-width: 90%;
}

button {
    overflow: hidden;
    border-radius: 10px;
    background-color: #ffffff;
    border: none;
    color: rgb(61, 61, 61);
    text-align: center;
    padding: 5px;
    font-size: 19px;
    width: 90%;
    cursor: pointer;
    box-shadow: 0 10px 20px -8px rgba(0, 0, 0, .7);
    position: relative;
    transition: all 0.4s;
    top: 0;
    margin-top: 20px;
    width: 300px;
    max-width: 90%;
    border: 1px solid #ccc;
}

main {
    width: 500px;
    max-width: 90%;
    margin: auto;
    margin-top: 40px;
}

input, label {
    display:block;
}

div.input-container {
    width: max-content;
    margin: auto;
    margin-top: 20px;
}

div.input-container label {
    text-align: start;
}

.hr {
    height: 3px;
    width: 100px;
    background-color:#333;
    margin:auto;
    margin-bottom: 30px;
}

button:hover {
    /* top: -10px; */
    transform: scale(0.95);
    box-shadow: none;
}

/* icon send */

.wrapper {
    width: 100px;
    margin: 4em auto 0;
}

.checkmark {
    stroke: rgb(40, 194, 40);
    stroke-dashoffset: 745.7485351563;
    stroke-dasharray: 745.7485351563;
    -webkit-animation: 2s dash 0.5s ease-out forwards;
            animation: 2s dash 0.5s ease-out forwards;
}

@-webkit-keyframes dash {
    0% {
        stroke-dashoffset: 745.7485351563;
    }
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes dash {
    0% {
        stroke-dashoffset: 745.7485351563;
    }
    100% {
        stroke-dashoffset: 0;
    }
}

/***************************************************************************************/

.card {
    border: 1px solid #ccc;
    padding: 30px;

    margin: auto;
    float: none;
    /* margin-bottom: 10px; */
    max-width: 90%;
    width: 500px;

    border-radius: 20px;
    background: linear-gradient(145deg, #fafafa, #ebebeb);
    box-shadow: 20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
    
    margin-bottom: 30px;
}

.alert {
    margin-top: 30px;
    border: none;
    padding: 3px;
    border-radius: 20px;
    background: linear-gradient(145deg, #ff6464, #ffacac);
    color: white;
    text-align: center;
    opacity: 0;
    position: relative;
    top: 30px;
    animation: 0.5s ease 0s forwards alternate view_error,  0.5s ease 3.5s forwards reverse view_error;
}

@keyframes view_error {
    from {
        opacity:0;
        top: 30px;
    }
    to {
        opacity:1;
        top: 0px;
    }
}

.hide{
    display: none;
}

#error:target {
    display: block !important;  
}