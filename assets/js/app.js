import leftPad from "left-pad";

var sum = (a, b) => a + b;

var makeSecretAgent = code => leftPad(code, 3, 0);

var sumSecretAgent = (a, b) => makeSecretAgent(sum(a, b));

global.sumSecretAgent = sumSecretAgent;

