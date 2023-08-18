import type { Joueur } from "./Aventure";

export type Map = {
    id: number
    nom: string
    infos: string
    paths: Path[]
    joueurs: Joueur[]
}

export type Path = {
    toId: number
    infos: string
    mapName: string
}