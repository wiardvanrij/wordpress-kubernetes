apiVersion: v1
kind: Service
metadata:
  name: wordpress
  labels:
    app: wordpress
spec:
  ports:
    - port: 80
      targetPort: 80
  selector:
    app: wordpress
    tier: frontend
---
apiVersion: autoscaling/v1
kind: HorizontalPodAutoscaler
metadata:
  name: wordpress
spec:
  scaleTargetRef:
    apiVersion: apps/v1
    kind: Deployment
    name: wordpress
  minReplicas: 2
  maxReplicas: 20
  targetCPUUtilizationPercentage: 70
---
apiVersion: apps/v1
kind: Deployment
metadata:
  name: wordpress
  labels:
    app: wordpress
spec:
  replicas: 2
  selector:
    matchLabels:
      app: wordpress
      tier: frontend
  strategy:
    type: RollingUpdate
    rollingUpdate:
      maxSurge: 1
      maxUnavailable: 0
  template:
    metadata:
      labels:
        app: wordpress
        tier: frontend
    spec:
      securityContext:
        fsGroup: 33
      containers:
        - image: gcr.io/GOOGLE_CLOUD_PROJECT/sysrant:COMMIT_SHA
          name: wordpress
          resources:
            limits:
              memory: "150Mi"
              cpu: "100m"
          volumeMounts:
            - name: config-volume
              mountPath: /etc/bucket                              
          env:
            - name: DB_NAME
              value: name
            - name: DB_USER
              value: user
            - name: DB_HOST
              value: 10.0.0.1
            - name: DB_CHARSET
              value: utf8mb4
            - name: DB_COLLATE
              value: ''  
            - name: AUTH_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: AUTH_KEY
            - name: SECURE_AUTH_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: SECURE_AUTH_KEY
            - name: LOGGED_IN_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: LOGGED_IN_KEY
            - name: NONCE_KEY
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: NONCE_KEY
            - name: AUTH_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: AUTH_SALT
            - name: SECURE_AUTH_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: SECURE_AUTH_SALT
            - name: LOGGED_IN_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: LOGGED_IN_SALT
            - name: NONCE_SALT
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: NONCE_SALT
            - name: DB_PASSWORD
              valueFrom:
                secretKeyRef:
                  name: wordpress-secrets
                  key: DB_PASSWORD       
      volumes:
        - name: config-volume
          configMap:
            name: bucket
            items:
            - key: bucket.json
              path: keys.json