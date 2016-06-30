function uspeh(ocena){
    if(ocena > 4.5){
        return 1;
    }else if(ocena > 3.5){
        return 2;
    }else if(ocena > 2.5){
        return 3;
    }else if(ocena > 1.5) {
        return 4;
    }else {
        return 5;
    }
}