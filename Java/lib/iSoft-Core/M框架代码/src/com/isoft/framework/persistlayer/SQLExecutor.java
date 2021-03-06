package com.isoft.framework.persistlayer;

import java.sql.Connection;
import java.util.HashMap;
import java.util.Map;

import org.apache.commons.lang.StringUtils;

import com.isoft.framework.common.interfaces.IIdentityBean;

public class SQLExecutor extends A_SQLExecutor {
	public SQLExecutor(Connection conn, IIdentityBean idBean) {
		super(conn, idBean);
	}

	@Override
	@SuppressWarnings("unchecked")
	protected void setupParams(Map paraMap) {
		if (paraMap == null) {
			paraMap = new HashMap(2);
		}
		if (idBean != null && StringUtils.isNotEmpty(idBean.getUserId())) {
			paraMap.put("tenantId", idBean.getTenantId());
			paraMap.put("tenantRole", idBean.getTenantRole().magic());
			paraMap.put("userId", idBean.getUserId());
			paraMap.put("userName", idBean.getUserName());
		}
	}
}
