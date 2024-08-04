import "./bootstrap";
import "./requiredFields";

import jquery from "jquery";
window.$ = window.jQuery = jquery;

import select2 from "select2";
select2();

$(document).ready(function () {
    $("select[multiple]").select2();
});
