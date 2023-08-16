export type Personnage = {
    nom: string
    job: string
}

export type Joueur = {
    id: number
    nom: string
    personnage: Personnage
}

export type Aventure = {
    nom: string
    synopsis: string
    joueurs: Joueur[]
}