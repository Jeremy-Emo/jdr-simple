import axios, {AxiosError, AxiosResponse} from "axios";

export async function useMovePlayer(idPlayer: number, idMap: number): Promise<unknown> {
    return await axios.post('/api/player/' + idPlayer + '/move/' + idMap).then((response: AxiosResponse<unknown>) => {
        const { data } = response
        return data
    }).catch((error: AxiosError) => {
        throw error
    })
}