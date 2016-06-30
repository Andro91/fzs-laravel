function uspeh(ocena){
    if(ocena > 4.49){
        return 1;
    }else if(ocena > 3.49){
        return 2;
    }else if(ocena > 2.49){
        return 3;
    }else if(ocena > 2.0) {
        return 4;
    }else {
        return 5;
    }
}