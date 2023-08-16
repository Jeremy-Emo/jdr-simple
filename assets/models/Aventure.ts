export type Personnage = {
    nom: string
    job: string
}

export type Joueur = {
    id: number
    nom: string
    personnage: Personnage
    mapId?: number
}

export type Aventure = {
    nom: string
    synopsis: string
    joueurs: Joueur[]
}