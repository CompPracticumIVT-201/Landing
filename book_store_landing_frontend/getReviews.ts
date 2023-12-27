import axios from 'axios';

async function getReviews() {
    try {
        const response = await axios.get('http://localhost:8080/api/reviews');
        const reviews = response.data.data;
        const firstThreeReviews = reviews.slice(0, 3);
        const lastTwoReviews = reviews.slice(3, 5);
        return { reviews, firstThreeReviews, lastTwoReviews };
    } catch (error) {
        console.error('Произошла ошибка при получении отзывов:', error);
        return { error: error };
    }
}

export { getReviews };