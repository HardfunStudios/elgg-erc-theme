<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

.elgg-button, .groups-widget-viewall a {
    display: inline-block;
    *display: inline;
    padding: 4px 12px;
    margin-bottom: 0;
    *margin-left: .3em;
    font-size: 14px;
    line-height: 20px;
    color: #013a4b;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #01bfd7;
    *background-color: #01bfd7;
    background-image: -moz-linear-gradient(top, #01bfd7, #39b2c3);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#39b2c3), to(#39b2c3));
    background-image: -webkit-linear-gradient(top, #01bfd7, #39b2c3);
    background-image: -o-linear-gradient(top, #01bfd7, #39b2c3);
    background-image: linear-gradient(to bottom, #01bfd7, #39b2c3);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    *border: 0;
    border-color: #01bfd7 #01bfd7 #bfbfbf;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-bottom-color: #b3b3b3;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ff01bfd7', GradientType=0);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    *zoom: 1;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.elgg-button:hover, .groups-widget-viewall a:hover,
.elgg-button:focus, .groups-widget-viewall a:focus,
.elgg-button:active, .groups-widget-viewall a:active,
.elgg-button.active,
.elgg-button.disabled,
.elgg-button[disabled] {
    color: #013a4b;
    background-color: #39b2c3;
    *background-color: #39b2c3;
}

.elgg-button:active, .groups-widget-viewall a:active,
.elgg-button.active {
    background-color: #39b2c3 \9;
}

.elgg-button:first-child {
    *margin-left: 0;
}

.elgg-button:hover, .groups-widget-viewall a:hover,
.elgg-button:focus, .groups-widget-viewall a:focus {
    color: #013a4b;
    text-decoration: none;
    background-position: 0 -15px;
    -webkit-transition: background-position 0.1s linear;
    -moz-transition: background-position 0.1s linear;
    -o-transition: background-position 0.1s linear;
    transition: background-position 0.1s linear;
}

.elgg-button:focus, .groups-widget-viewall a:focus {
    /*outline: thin dotted #333;*/
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}

.elgg-button.active,
.elgg-button:active, .groups-widget-viewall a:active {
    background-image: none;
    outline: 0;
    -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
}

.elgg-button.disabled,
.elgg-button[disabled] {
    cursor: default;
    background-image: none;
    opacity: 0.65;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
