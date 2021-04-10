export interface Meteo{
    coord           : Coord;
    weather         : Weather[];
    base            : string;
    timezone        : string;
    name            : string;   
}

interface Weather{
    icon            : string;
    id              : number;
    description     : string;
}

interface Coord {
    lon     : string;
    lat     : string;
}