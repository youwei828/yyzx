export default () => ({
    async request(url = '', option = { method: 'get' }) {
        return await fetch(`http://localhost:3000/news/${url}`, option).then(r => r.json());
    },
    async get(url) {
        return await this.request(url);
    },
    async delete(url) {
        return await this.request(url, { method: 'delete' });
    },
    async post(data) {
        return await this.request('', {
            method: 'post',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data),
        });
    },
});
