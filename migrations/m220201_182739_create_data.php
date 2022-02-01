<?php

use yii\db\Migration;

/**
 * Class m220201_182739_create_data
 */
class m220201_182739_create_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO user (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) VALUES (1, 'admin', '1RnsoH5vROwgHx41-xBOeWmWtDbz1cFq', '$2y$13$.SpvBjmvWcKzfAAzpYYHxOs/Yv579EzkP5epOjoeI2052otCI4RRm', null, 'nalivkina_ekaterina@mail.ru', 10, 1643404351, 1643404351, null);
INSERT INTO user (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) VALUES (2, 'user', 'Z5pOnEuPxOYeJS0bWgsKu4vOHkdVtSsc', '$2y$13$1KrZ6Fs0Yref5yNq0pvqZ.bmMcgjqF0JaMmhKxm0AJfsTeww0766y', null, 'user@mail.ru', 10, 1643486195, 1643486195, null);
INSERT INTO user (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) VALUES (3, 'boss', 'KS10H7_BUwZH73TAvbw3rNgo1Wp6vWZE', '$2y$13$3Z.E5/Ehso//BGNK.NC5Tu/wks6L9KTzVdKx.gQpKZqDuAp.XRJH6', null, 'boss@mail.ru', 10, 1643486265, 1643486265, null);");

        $this->execute("INSERT INTO auth_assignment (item_name, user_id, created_at) VALUES ('admin', '1', 1643483585);
INSERT INTO auth_assignment (item_name, user_id, created_at) VALUES ('co-worker', '2', 1643483585);
INSERT INTO auth_assignment (item_name, user_id, created_at) VALUES ('supervisor', '3', 1643483585);");

        $this->execute("INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('admin', 1, 'Администратор', null, null, 1643483585, 1643483585);
INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('canAdmin', 2, 'Право входа в админку', null, null, 1643484236, 1643484236);
INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('co-worker', 1, 'Сотрудник', null, null, 1643483588, 1643483588);
INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('supervisor', 1, 'Руководитель', null, null, 1643483588, 1643483588);
INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('updateOwnTask', 2, 'Редактировать неотмеченное задание', 'isUpdate', null, 1643489201, 1643489201);
INSERT INTO auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('updateTask', 2, 'Редактировать задание', null, null, 1643489594, 1643489594);");

        $this->execute("INSERT INTO auth_item_child (parent, child) VALUES ('admin', 'canAdmin');
INSERT INTO auth_item_child (parent, child) VALUES ('supervisor', 'canAdmin');
INSERT INTO auth_item_child (parent, child) VALUES ('co-worker', 'updateOwnTask');
INSERT INTO auth_item_child (parent, child) VALUES ('supervisor', 'updateTask');
INSERT INTO auth_item_child (parent, child) VALUES ('updateOwnTask', 'updateTask');");

        $this->execute("INSERT INTO auth_rule (name, data, created_at, updated_at) VALUES ('isUpdate', 0x4F3A32303A226170705C72756C65735C55706461746552756C65223A333A7B733A343A226E616D65223B733A383A226973557064617465223B733A393A22637265617465644174223B693A313634333438383835393B733A393A22757064617465644174223B693A313634333438383835393B7D, 1643488859, 1643488859);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("delete from auth_rule");
        $this->execute("delete from auth_item_child");
        $this->execute("delete from auth_item");
        $this->execute("delete from auth_assignment");
        $this->execute("delete from user");
    }

}
