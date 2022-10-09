import Todo from './component/Todo.js';
import db from './data/db.js';
export default {
    components: {
        //局部标签进行注册
        todo: Todo,
    },
    data() {
        return {
            db,
        };
    },
};
