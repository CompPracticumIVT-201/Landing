import axios from 'axios';

export async function getBooks() {
    try {
        const response = await axios.get(`http://localhost:8080/api/books`);
        return response.data.data;
    } catch (error) {
        console.error(error);
    }
}

