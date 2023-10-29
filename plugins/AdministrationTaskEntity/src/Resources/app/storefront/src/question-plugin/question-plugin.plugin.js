import Plugin from 'src/plugin-system/plugin.class';
import HttpClient from 'src/service/http-client.service';

export default class QuestionPlugin extends Plugin {
    init() {
        this._client = new HttpClient();
        this.requestCustomRoute();
    }
    
    requestCustomRoute() {
        this._client.post('/question', { limit: 10, offset: 0}, (response) => {
            alert(response);
        });
    }
}