export default async function () {
    return fetch("http://brothersgurylevi.ru/content.json")
        .then(data => data.json());
}