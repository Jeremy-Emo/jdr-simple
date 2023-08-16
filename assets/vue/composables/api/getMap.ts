import type {Map} from "../../../models/Map";
import axios, {AxiosError, AxiosResponse} from "axios";

export async function getMap(id: number): Promise<Map> {
    return await axios.get('/api/map/' + id).then((response: AxiosResponse<Map>) => {
        const { data } = response
        return data
    }).catch((error: AxiosError) => {
        throw error
    })
}