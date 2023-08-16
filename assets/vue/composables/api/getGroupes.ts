import {Groupe} from "../../../models/Groupe";
import axios, {AxiosError, AxiosResponse} from "axios";

export async function getGroupes(): Promise<Groupe[]> {
    return await axios.get('/api/groupes').then((response: AxiosResponse<Groupe[]>) => {
        const { data } = response
        return data
    }).catch((error: AxiosError) => {
        throw error
    })
}