{% if method['response'] is defined and method['response'] is type('array') and method['response']|length > 0 %}
    <h4>Body</h4>
    <table class="table table-bordered table-hover">
        {% if method['response'][0][0] is defined %}
        {% for response in method['response'] %}
        <tr>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                    </tr>
                    {% for subResponse in response %}
                    <tr>
                        <td><code>{{ subResponse['name'] }}</code></td>
                        <td><i>{{ subResponse['type'] }}</i></td>
                        <td>{{ subResponse['description'] }}</td>
                    </tr>
                    {% endfor %}
                </table>
            </td>
        </tr>
        {% endfor %}
        <tr>
            <td>...</td>
        </tr>
        {% else %}
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        {% for response in method['response'] %}
        <tr>
            <td><code>{{ response['name'] }}</code></td>
            <td><i>{{ response['type'] }}</i></td>
            <td>{{ response['description'] }}</td>
        </tr>
        {% endfor %}
        {% endif %}
    </table>
{% endif %}