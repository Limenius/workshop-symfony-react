import leftPad from "left-pad";

var sum = (a, b) => a + b;

var makeSpy = code => leftPad(code, 3, 0);

var sumSpy = (a, b) => makeSpy(sum(a, b));

global.sumSpy = sumSpy;
