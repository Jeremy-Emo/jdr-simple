import type {Aventure} from "../../../models/Aventure";
import axios, {AxiosError, AxiosResponse} from "axios";

export async function getAventure(id: number): Promise<Aventure> {
    return await axios.get('/api/aventure/' + id).then((response: AxiosResponse<Aventure>) => {
        const { data } = response
        return data
    }).catch((error: AxiosError) => {
        throw error
    })
}